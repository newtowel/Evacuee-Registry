const shelter = prompt('避難所名を設定してください。');

const video = document.createElement('video');
const canvas = document.getElementById('canvas');
const context = canvas.getContext('2d');

// let code = null;
let is_already_loaded = false;
    
//webカメラのキャッチ
navigator.mediaDevices.getUserMedia({ video: true })
    .then((stream) => {

        //webcamから得たstreamをvideoにあてる
        video.srcObject = stream;
        video.play();
        requestAnimationFrame(renderFrame);

    });

// renderFrame();

//描画
function renderFrame(){
 
    if(video.readyState === video.HAVE_ENOUGH_DATA) {
    
        canvas.height = video.videoHeight;
        canvas.width = video.videoWidth;
        
        //canvasをもとにしたcontextに描画
        context.drawImage(video, 0, 0, canvas.width, canvas.height);
        //ストリームが映るcontextから画像を得る
        const imageData = context.getImageData(0, 0, canvas.width, canvas.height);
        //得た画像からQRコードを得る
        const code = jsQR(imageData.data, imageData.width, imageData.height);
        
        //コードが映っていれば
        if(code) {
    
            is_already_loaded = true;
            let uuid = code.data;
            
            //QRコードのUUIDからPOSTでユーザ確認、存在すればshelterを避難所名カラムに設定する
            axios.post('/admin/home', { uuid: uuid, shelter: shelter })
                .then((response) => {
    
                    const name = response.data.name;
                    
                    //DBに存在するユーザなら、確認した旨アラートを出し、避難者リストページへリダイレクト
                    if(name) {
                        
                        console.log(name);
                        // if (!alert(name + 'さん、ようこそ！')){
                        //     //shelterに避難した者たちのリスト表示ページを開く
                        //     location.href = '/admin/evacuee/list?shelter=' + shelter;
                        //     name = null;
                        // }
                        console.trace();
                        alert(name + 'さん、ようこそ！');
                        location.href = '/admin/evacuee/list?shelter=' + shelter;
                        
                    } else {
                    }
                })
                .catch((error) => {
                    alert('このユーザは登録されていません');
                    location.href = '/admin/home';
                    console.info(error.config);
                })
                .then(() => {
                    // code = null;
                    uuid = '';
                });
        }
    }

    if(!is_already_loaded) requestAnimationFrame(renderFrame);   // 描画を繰り返す

}