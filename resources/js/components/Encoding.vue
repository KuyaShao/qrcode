<template>
    <div class="row">
        <div class="col-md-8 col-sm-8 col-lg-8 mx-auto">
            <div v-if="loading">Loading...</div>
            <div v-else class="card mx-auto">
                <div class="card-body">
                    <div class="text-center mt-3">
                        <h1 class="text-center">Take a Picture</h1>
                        <div>

                            <div class="camera">
                                <p class="text-left" style="color: red;">Note: Take a picture of your hard copy form</p>
                                <video playsinline autoplay class="feed"></video>
                                <button class="snap" @click="takePicture">Capture</button>
                            </div>

                            <div class="picture text-center">
                                <canvas class="canvas"></canvas>
                            </div>
                            <div class="space text-center">
                                <button class="btn btn-primary" @click="savePicture">Save Picture</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <h6 class="text-center text-muted mb-4 mt-3">#WeHealAsOne #AkoTayoAngMariveles</h6>
        </div>
    </div>


</template>

<script>


export default {
    name: "Encoding",

    data: () => ({
        data: {
            pics: '',
            picture:''
        },
        loading: false
    }),
    methods: {
        init() {
            if ('mediaDevices' in navigator && 'getUserMedia' in navigator.mediaDevices) {
                let constraints = {
                    video: {
                        width: {
                            min: 640,
                            ideal: 1200,
                            max: 1920
                        },
                        height: {
                            min: 360,
                            ideal: 720,
                            max: 1080
                        },
                        facingMode: {
                            exact: 'environment'
                        }
                    }
                }
                navigator.mediaDevices.getUserMedia(constraints)
                    .then(stream => {

                        const videoPlayer = document.querySelector("video");
                        videoPlayer.srcObject = stream;
                        videoPlayer.play()

                    })
            } else {
               this.swr()
            }
        },
        takePicture() {
            let ratio = (window.innerHeight < window.innerHeight) ? 16 / 9 : 9 / 16;
            const picture = document.querySelector("canvas")
            const ctx = picture.getContext("2d");
            ctx.imageSmoothingEnabled = "high"
            ctx.drawImage(document.querySelector("video"), 0, 0, picture.width, picture.height)
            let dataUri = picture.toDataURL();
            this.data.picture = dataUri

        },

        async savePicture() {
            const res = await this.callApi('post', '/api/encoding', this.data);
            if (res.status == '200' || res.status === '201') {
                this.s('Users Profile Picture successfully Updated ')
                this.data.pics = this.data.picture
            } else {
                if (res.status == '422') {
                    for (let i in res.data.errors) {
                        this.e(res.data.errors[i][0])
                    }

                } else {
                    this.swr()
                }
            }
        },
    },
    beforeMount() {
        this.loading = true
        this.init()
        this.loading = false
    },
    async created() {
        const res = await this.callApi('get', '/api/name')
        if (res.status === 200) {
            this.names = res.data.business
        }
    }
}
</script>

<style lang="scss" scoped>
.camera {
    padding: 25px;
    box-sizing: border-box;

.feed {
    display: block;
    width: 100%;
    max-width: 1200px;

    margin: 0 auto;

    background-color: #171717;
    box-shadow: 6px 6px 12px 0px rgba(0, 0, 0, 0.35);
}

.snap {
    display: block;
    width: 75px;
    height: 75px;
    border-radius: 50%;
    margin: 25px auto;
    background-color: transparentize($color: #FFCE00, $amount: 0.5);
    border: 1px solid #171717;
    outline: none;
    cursor: pointer;

&:hover {
     background-color: #FFCE00;
 }

&:active {
     background-color: darken($color: #FFCE00, $amount: 10);
 }
}

.picture {
    display: block;
    width: 100vw;
    height: 100vh;
    padding: 25px;
    box-sizing: border-box;
}

.canvas {
    display: block;
    width: 100%;
    max-width: 1200px;

    margin: 0 auto;
    box-shadow: 4px 4px 12px 8px transparentize($color: #171717, $amount: 0.5);


}
}
</style>
