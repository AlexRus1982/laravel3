<div class="wishes-icon hidden mt-2" title="">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FFF" class="bi bi-heart" viewBox="0 0 16 16">
        <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
    </svg>
    <div class="wishes-count"></div>
</div>

<!-- Список желаний -->
<div class="offcanvas offcanvas-end" style="width: 600px; box-shadow: 0px 0px 4px #000000;" tabindex="-1" id="wishesOffcanvas" aria-labelledby="wishesOffcanvasLabel">
    
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="wishesOffcanvasLabel" style="font-size: 20px; font-weight: 600;">Избранное</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body d-flex flex-nowrap flex-column py-2 border-bottom">
        <!-- список товаров -->
        <div id="wishes-list" class="w-100"></div>
    </div>
</div>

<style>
  #wishesOffcanvas {
    font-size: 20px;
    padding: 0px 40px 0px 40px;
  }

  #wishesOffcanvas .btn-close {
    position: absolute;
    margin-left: -85px;
    margin-top: -10px;
  }

  #wishesOffcanvas .offcanvas-body {
    padding-top: 0px;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    line-height: 2;
    padding: 0px 0px 0px 0px;
  }

  #wishesOffcanvas .offcanvas-body a {
    color: #000000;
    text-decoration: none;
  }

  #wishesOffcanvas .offcanvas-header {
    padding: 11px 0px 11px 0px;
  }

</style>