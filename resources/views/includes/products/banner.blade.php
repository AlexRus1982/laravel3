<div class="banner {{--start--}}">
    <div class="banner__text">ЭКСКЛЮЗИВНАЯ МЕБЕЛЬ СО ВСЕГО МИРА</div>
</div>
<style>
    .banner {
        width: 100%;
        height: 260px;
        /* max-width: 1200px; */
        margin: 45px 0px 30px 0px;
        /* background: linear-gradient(42deg, #ff00cc 0%, #3300ff 100%); */
        background: #000;
        /* border-radius: 15px; */
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        transition: 1.0s;
        transform: scale(1.0);
        z-index: 0;
        overflow: hidden;
    }

    .banner.start {
        transition: 0.0s;
        transform: scale(0.0);
    }

    .banner__text {
        display: flex;
        font-family: "Arial", Arial, sans-serif;
        color: #FFF;
        white-space: nowrap;
        width: 100%;
        transform: scaleY(1.5);
        /* max-width: 665px; */
        /* margin: 20px 0px 20px 0px; */
        line-height: 0.95;
        font-weight: 900;
        padding: 0px 40px 0px 40px;
        align-items: center;
        text-align: center;
        justify-content: center;
    }

    @media (min-width: 0px) and (max-width: 1899px) {
        .banner__text {
            font-size: calc( (100vw - 320px)/(1900 - 320) * (65 - 10) + 10px);
        }

        .banner__image img {
            width: calc( (100vw - 320px)/(1900 - 320) * (276 - 100) + 100px);
            height: calc( (100vw - 320px)/(1900 - 320) * (320 - 120) + 120px);
        }

        .banner {
            height: calc( (100vw - 320px)/(1900 - 320) * (260 - 100) + 100px);
        }
    }

    @media (min-width: 1900px) {
        .banner__text {
            font-size: 65px;
        }

        .banner__image img {
            width: 276px;
            height: 320px;
        }

        .banner {
            height: 260px;
        }
    }

    .banner__image {
        margin-top: -30px;
        display: flex;
    }

</style>