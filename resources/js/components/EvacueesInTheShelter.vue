<template>
    <div>
        <div style="text-align:center;font-size:35px;">QRコードを読みとります</div>
        <br>
        <canvas id="canvas"></canvas>
    </div>
</template>
<script>
    export default {
        data: function(){
            return {
                num: 1,
                video: null,
                canvas: null,
                context: null,
                uuid: '',
                shelter: '',
                completed: false
            }
        },
        computed: {
            hasUuid() {

                return (this.uuid !== '');

            }
        },
        methods: {
            renderFrame() {

                requestAnimationFrame(this.renderFrame);   // 描画を繰り返す


                // if(!this.hasUuid && !this.completed) { // まだQRコードが読み込まれていない場合

                    
                //     }

                // }

                const video = this.video;
                const canvas = this.canvas;
                const context = this.context;
                const shelter = this.shelter;

                if(video.readyState === video.HAVE_ENOUGH_DATA) {

                    canvas.height = video.videoHeight;
                    canvas.width = video.videoWidth;
                    context.drawImage(video, 0, 0, canvas.width, canvas.height);
                    const imageData = context.getImageData(0, 0, canvas.width, canvas.height);
                    const code = jsQR(imageData.data, imageData.width, imageData.height);

                    if(code) {

                        this.uuid = code.data;
                        
                        axios.post('/admin/home', { uuid: this.uuid, shelter: this.shelter })
                            .then((response) => {

                                const user = response.data.user;
                                if(user) {
                                    console.log(user);
                                    this.completed = true;
                                    console.log("num: " + this.num);
                                    alert('「'+ user +'」さん、ようこそ！');
                                    location.href('admin.list');
                                } else {
                                    console.log('ログイン失敗..');
                                }
                            })
                            .catch((error) => {console.info(error.config);})
                            .then(() => {

                                this.uuid = '';
                            });
                    }
                }
            }
        },
        mounted() {

            this.shelter = prompt('避難所名を設定してください。');

            this.video = document.createElement('video');
            this.canvas = document.getElementById('canvas');
            // console.log("canvas: ", this.canvas);
            console.log("hoge");
            this.context = this.canvas.getContext('2d');

            navigator.mediaDevices.getUserMedia({ video: true })
                .then((stream) => {

                    this.video.srcObject = stream;
                    this.video.play();
                    requestAnimationFrame(this.renderFrame);

                });
        }
    };
</script>