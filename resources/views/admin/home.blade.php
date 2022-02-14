<html>
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<head>
    <style>

        canvas {
            padding-left: 0;
            padding-right: 0;
            margin-left: auto;
            margin-right: auto;
            display: block;
            width: 50%;
        }

    </style>
</head>
<body>
    <label for="shelter">避難所名:</label>

    <input type="text" id="shelter" name="shelter" required>

<div id="app">
    <div id="entire">
        <div style="text-align:center;font-size:35px;">QRコードを読みとります</div>
        <br>
        <canvas id="canvas"></canvas>
            <h1>入場した避難者</h1>
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th>氏名</th>
                    <th>ふりがな</th>
                  </tr>
                </thead>
                <tbody>
                    
                    <!--<tr v-for="evacuee in evacuees_here"> -->
                    <!--    -->
                    <!--</tr>-->
                </tbody>
            </table>
            <!--<span v-text="num"></span>-->
            @{{ num }}
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script>
    <script src="{{asset('/js/jsQR.js')}}"></script>
    <script>
        const app = new Vue({
            el: 'app',
            data: {
                num: 1,
                video: null,
                canvas: null,
                context: null,
                uuid: '',
                shelter: '',
                evacuees_here: [],
                completed: false
            },
            computed: {
                hasUuid() {

                    return (this.uuid !== '');

                },
                evacueesHere: function(){
                    return this.evacuees_here;
                }
            },
            methods: {
                renderFrame() {

                    requestAnimationFrame(this.renderFrame);   // 描画を繰り返す

                    if(!this.hasUuid && !this.completed) { // まだQRコードが読み込まれていない場合

                        const video = this.video;
                        const canvas = this.canvas;
                        const context = this.context;

                        if(video.readyState === video.HAVE_ENOUGH_DATA) {

                            canvas.height = video.videoHeight;
                            canvas.width = video.videoWidth;
                            context.drawImage(video, 0, 0, canvas.width, canvas.height);
                            const imageData = context.getImageData(0, 0, canvas.width, canvas.height);
                            const code = jsQR(imageData.data, imageData.width, imageData.height);

                            if(code) {

                                this.uuid = code.data;
                                this.shelter = document.getElementById('shelter').value;
                                
                                axios.post('/admin/home', { uuid: this.uuid, shelter: this.shelter })
                                    .then((response) => {

                                        const user = response.data.user;
                                        if(user) {
                                            console.log(name);
                                            this.completed = true;
                                            this.evacuees_here.unshift([user.name, user.furigana]);
                                            console.log("e.h.: " + this.evacuees_here);
                                            console.log("num: " + this.num);
                                            //alert('「'+ user.name +'」さん、ようこそ！');
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

                }
            },
            mounted() {

                this.video = document.createElement('video');
                this.canvas = document.getElementById('canvas');
                this.context = this.canvas.getContext('2d');

                navigator.mediaDevices.getUserMedia({ video: true })
                    .then((stream) => {

                        this.video.srcObject = stream;
                        this.video.play();
                        requestAnimationFrame(this.renderFrame);

                    });

            }
        });

    </script>
</body>
</html>