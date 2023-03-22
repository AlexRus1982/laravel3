<div class="preloader">
    <div class="left-half start">
        <div class="left-half-text" style="color: #000;">LEG</div>
    </div>
    <div class="right-half start">
        <div class="right-half-text" style="color: #000;">ER
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
            </svg>
        </div>
    </div>
    {{-- <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-yin-yang" viewBox="0 0 16 16">
        <path d="M9.167 4.5a1.167 1.167 0 1 1-2.334 0 1.167 1.167 0 0 1 2.334 0Z"/>
        <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0ZM1 8a7 7 0 0 1 7-7 3.5 3.5 0 1 1 0 7 3.5 3.5 0 1 0 0 7 7 7 0 0 1-7-7Zm7 4.667a1.167 1.167 0 1 1 0-2.334 1.167 1.167 0 0 1 0 2.334Z"/>
    </svg> --}}
</div>
<style>
    .preloader {
        position: fixed;
        top: 0px;
        left: 0px;
        bottom: 0px;
        right: 0px;
        opacity: 1.0;
        display: flex;
        flex-direction: row;
        transition: 1.0s;
        z-index: 100000;
    }

    .preloader.off {
        opacity: 0.0;
        transform: scale(1.0);
    }

    .right-half-text svg {
        width: 5vw;
        height: 5vw;
        margin-left: -2vw;
        margin-top: -5vw;
        animation-name: rotation;
        animation-duration: 2s;
        animation-iteration-count: infinite;
        animation-timing-function: linear;
    }    

    .preloader .left-half {
        position:absolute;
        left: -50vw;
        height: 100vh;
        width:50vw;
        display: flex;
        justify-content: flex-end;
        align-items: center;
        background: #FFF;
        transition: 1.0s;
    }

    .preloader .left-half.start {
        left: 0px;
        transition: 1.0s;
    }

    .preloader .right-half {
        position:absolute;
        left: 100vw;
        height: 100vh;
        width: 50vw;
        display: flex;
        justify-content: flex-start;
        align-items: center;
        background: #FFF;
        transition: 1.0s;
    }

    .preloader .right-half.start{
        left: 50vw;
        transition: 1.0s;
    }    

    .preloader .right-half .right-half-text,
    .preloader .left-half .left-half-text {
        color: #000;
        font-size: 10vw;
        font-weight: 600;

    }

    @keyframes rotation {
        0% {
            transform:rotate(0deg);
        }
        100% {
            transform:rotate(360deg);
        }
    }
</style>