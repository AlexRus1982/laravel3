//----------------------------------------------------------------------------------------------------------
//#region addition functions
//----------------------------------------------------------------------------------------------------------
const ImageNoPhotoPath = "images/no-photo.svg";
function translit(word) {
    var converter = {
        'а': 'a', 'б': 'b', 'в': 'v', 'г': 'g', 'д': 'd',
        'е': 'e', 'ё': 'e', 'ж': 'zh', 'з': 'z', 'и': 'i',
        'й': 'y', 'к': 'k', 'л': 'l', 'м': 'm', 'н': 'n',
        'о': 'o', 'п': 'p', 'р': 'r', 'с': 's', 'т': 't',
        'у': 'u', 'ф': 'f', 'х': 'h', 'ц': 'c', 'ч': 'ch',
        'ш': 'sh', 'щ': 'sch', 'ь': '', 'ы': 'y', 'ъ': '',
        'э': 'e', 'ю': 'yu', 'я': 'ya'
    };

    word = word.toLowerCase();

    var answer = '';
    for (var i = 0; i < word.length; ++i) {
        if (converter[word[i]] == undefined) {
            answer += word[i];
        } else {
            answer += converter[word[i]];
        }
    }

    answer = answer.replace(/[^-0-9a-z]/g, '-');
    answer = answer.replace(/[-]+/g, '-');
    answer = answer.replace(/^\-|-$/g, '');
    return answer;
}

function imagePreview(fileInput) {
    if (fileInput.files && fileInput.files[0]) {
        var fileReader = new FileReader();
        fileReader.onload = function (event) {
            const img = $(fileInput).parent().find('img');
            img.attr('src', event.target.result);
            img.css('display', 'block');

            const svg = $(fileInput).parent().find('svg');
            svg.css('display', 'none');
        };
        fileReader.readAsDataURL(fileInput.files[0]);
    }
}

function imageSetPreview(fileInput, filePath) {
        const img = $(fileInput).parent().find('img');
        img.attr('src', filePath);
        img.css('display', 'block');

        const svg = $(fileInput).parent().find('svg');
        svg.css('display', 'none');
}
//----------------------------------------------------------------------------------------------------------
//#endregion addition functions
//----------------------------------------------------------------------------------------------------------

//----------------------------------------------------------------------------------------------------------
//#region tabs classes
//----------------------------------------------------------------------------------------------------------
class AdminExport {

    constructor() {
        console.log(this.constructor.name);
        this.token = $('meta[name="csrf-token"]').attr('content');
        this.MakeExportKeys();
    }

    copyTextToClipboard(text) {
        let textArea = document.createElement("textarea");
      
        textArea.style.position = 'fixed';
        textArea.style.top = '-4em';
        textArea.style.left = '0';
        textArea.style.width = '2em';
        textArea.style.height = '2em';
        textArea.style.padding = 0;
        textArea.style.border = 'none';
        textArea.style.outline = 'none';
        textArea.style.boxShadow = 'none';
        textArea.style.background = 'transparent';
        textArea.value = text;
        document.body.appendChild(textArea);
        textArea.focus();
        textArea.select();
      
        try {
            var successful = document.execCommand('copy');
            var msg = successful ? 'successful' : 'unsuccessful';
            window.messages.Success('Скопировано в буфер обмена ' + msg);
        } catch (err) {
            window.messages.Danger('Не скопировано !!! ' + msg);
        }
      
        document.body.removeChild(textArea);
    }

    MakeExportKeys() {
        const that = this;

        $('#export-accept-button').off('click');
        $('#export-accept-button').on('click', ()=>{
            this.CreateNewExport();
        });

        $('.export-to-trash svg').off('click');
        $('.export-to-trash svg').on('click', function() {
            that.DeleteExport($(this).parent());
        });

        $('.export-save-button').off('click');
        $('.export-save-button').on('click', function() {
            that.SaveExport($(this));
        });

        $('input[table-column-name="export_file_name"]').off('keyup');
        $('input[table-column-name="export_file_name"]').on('keyup', function() {
            const export_id = $(this).attr('export_id');
            $(`#export-${export_id}-path-name`).prop('innerHTML', $(this).val());
        });

        $('input[table-column-name="export_file_ext"]').off('keyup');
        $('input[table-column-name="export_file_ext"]').on('keyup', function() {
            const export_id = $(this).attr('export_id');
            $(`#export-${export_id}-path-ext`).prop('innerHTML', $(this).val());
        });


        $('.copy-clipboard').off('click');
        $('.copy-clipboard').on('click', (event) => {
            const export_id = $(event.currentTarget).attr('export_id');
            const siteURL = $(`#export-${export_id}-path-site`).prop('innerHTML');
            const fileName = $(`#export-${export_id}-path-name`).prop('innerHTML');
            const fileExt = $(`#export-${export_id}-path-ext`).prop('innerHTML');
            this.copyTextToClipboard(`${siteURL}${fileName}.${fileExt}`);
        });

        $('.go-sitelink').off('click');
        $('.go-sitelink').on('click', function(event) {
            const export_id = $(this).attr('export_id');
            const siteURL = $(`#export-${export_id}-path-site`).prop('innerHTML');
            const fileName = $(`#export-${export_id}-path-name`).prop('innerHTML');
            const fileExt = $(`#export-${export_id}-path-ext`).prop('innerHTML');
            const link = `${siteURL}${fileName}.${fileExt}`;
            window.open(link);
            event.stopPropagation();
        });
    }

    CreateNewExport() {

        const newExportPromise = new Promise((resolve, reject) => {
            let data = {};

            $('#addExport *[table-data]').each(function() {
                const tableColumnName = $(this).attr('table-column-name');
                const fieldValue = $(this).val();
                data[`${tableColumnName}`] = fieldValue;
            });

            data['export_file_ext'] = $(`#addExport *[table-data][table-column-name="export_format"]`).val();
            console.debug(data);

            $.ajax({
                url: "/export/add",
                type : "POST",
                data : data,
                success: response => resolve(response),
                error: (e)=>reject(e),
            });
        });

        newExportPromise
        .then((response) => {
            $('#addExport').modal('hide');
        });
        
    }

    DeleteExport(element) {
        const id = element.attr('export_id');
        
        if (!confirm(`Удалить экспорт - ${id}`)) {
            return;
        }

        const deleteExportPromise = new Promise((resolve, reject) => { 
            $.ajax({
                url: "/export/delete",
                type : "DELETE",
                data : {
                    'export_id' : id,
                },
                success: response => resolve(response),
                error: (e)=>reject(e),
            });
        });

        deleteExportPromise
        .then((response) => {
            element.parent().parent().parent().remove();
        });
        
    }

    SaveExport(element) {
        const id = element.attr('export_id');
        const format = element.attr('export_format');
        const savedData = {};

        $(`*[export_id="${id}"][table-data]`).each((index, element) => {
            const tableColumn = $(element).attr('table-column-name');
            const elementType = $(element).attr('type');

            if (elementType == "text"){
                savedData[`${tableColumn}`] = $(element).val();
            }

        });

        if (format == "csv") {
            console.debug($(`#export-${id}-columns-radio1`));
            const export_csv_all_columns = $(`#export-${id}-columns-radio1`).prop('checked') ? "1" : "0";
            savedData['export_csv_all_columns'] = export_csv_all_columns;
            if (export_csv_all_columns == "0") {
                const columns = [];
                $('.export-columns label').each((index, element) => {
                    const checked = $(element).parent().find('input').prop('checked');
                    if (checked) {
                        columns.push($(element).prop('innerHTML'));
                    }
                });
                savedData['export_csv_columns'] = columns.join(';');
            }
        }

        console.debug(savedData);

        // return;

        const saveExportPromise = new Promise((resolve, reject) => {
            $.ajax({
                url: "/export/save",
                type : "PUT",
                data : {
                    'export_id' : id,
                    'savedData' : savedData,
                },
                success: response => resolve(response),
                error: (e)=>reject(e),
            });
        });

        saveExportPromise
        .then((response) => {
            window.messages.Success('Информация сохранена.');
        });
        
    }

}

class AdminSEO {

    constructor() {
        console.log(this.constructor.name);
        this.token = $('meta[name="csrf-token"]').attr('content');
        this.LoadSEOParams();
        this.LoadLayoutParams();
        this.LoadWebmasterParams();
        this.LoadRobotsTXT();
        this.MakeSEOKeys();
        
        this.RootFilesListener();

        let dropArea = document.getElementById('root-files-list');

        function preventDefaults (e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, preventDefaults, false);
        });

        function highlight(e) {
            dropArea.classList.add('highlight');
        }

        function unhighlight(e) {
            dropArea.classList.remove('highlight');
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            dropArea.addEventListener(eventName, highlight, false);
          });

        ['dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, unhighlight, false);
        });

        function uploadFiles(files) {
            let url = 'ВАШ URL ДЛЯ ЗАГРУЗКИ ФАЙЛОВ';
            let formData = new FormData();
            let counter = 1;

            formData.append('upload_dir', '');
            files.forEach(file => {
                formData.append(`file${counter++}`, file);
            });
            // console.debug(url, formData, files);

            $.ajax({
                url: "/admin/seo/file/save",
                type : "POST",
                data : formData,
                cache: false,
                contentType: false,
                processData: false,
                dataType : 'json',
                success: response => {
                    window.messages.Success('File(s) loded.');
                },
                error: (e) => console.error(e),
            });

        }

        function handleDrop(e) {
            let dt = e.dataTransfer;
            let files = dt.files;
            uploadFiles([...files]);
        }

        dropArea.addEventListener('drop', handleDrop, false);

    }

    RootFilesListener() {
        const files = () => {
            $.ajax({
                url: "/admin/seo/root/load",
                type : "GET",
                success: response => {

                    $('#root-files-list').prop('innerHTML', $(response).prop('innerHTML'));
                },
                error: (e) => console.error(e),
            });
        };

        setInterval(() => {
            files();
        }, 500);
    }

    MakeSEOKeys() {

        $('#robots-save-button').off('click');
        $('#robots-save-button').on('click', () => {
            this.SaveRobotsTXT();
        });

        $('#seo-params-save-button').off('click');
        $('#seo-params-save-button').on('click', () => {
            this.SaveSEOParams();
        });

        $('#layout-save-button').off('click');
        $('#layout-save-button').on('click', () => {
            this.SaveLayoutParams();
        });

        $('#webmaster-save-button').off('click');
        $('#webmaster-save-button').on('click', () => {
            this.SaveWebmasterParams();
        });

        $('.section-header').off('click');
        $('.section-header').on('click', event => {
            this.ToggleSectionInfo(event);
        });

        $('.input-icon input').off('change');
        $('.input-icon input').on('change', event => {
            imagePreview(event.currentTarget);
        });

    }

    LoadRobotsTXT() {
        $.ajax({
            url : "robots.txt",
            dataType: "text",
            success : function (data) {
                $("#robots-text").text(data);
            }
        });
    }

    SaveRobotsTXT() {
        $.ajax({
            url: "/admin/robots/save",
            type : "PUT",
            data: {content : $('#robots-text').val()},
            success: response => {
                window.messages.Success('Robots.txt saved.');
            },
            error: (e)=>console.warn('error', e),
        });
    }

    SaveSEOParams() {
        let data = {};
        $('#collapse_SEO_Params *[table-data]').each(function() {
            const tableColumnName = $(this).attr('table-column-name');
            const fieldValue = $(this).val();
            data[`${tableColumnName}`] = fieldValue;
        });

        console.log(data);

        $.ajax({
            url: "/admin/seo/save",
            type : "PUT",
            data: {params : data},
            success: response => {
                window.messages.Success('Seo params saved.');
            },
            error: (e)=>console.warn('error', e),
        });
    }

    async SaveLayoutParams() {
        let data = {};
        const imagesPrimises = [];

        $('#collapse_Layout_Params *[table-data]').each(function() {
            const dataType = $(this).attr('table-data');
            const storePath = $(this).attr('store-path');
            const tableColumnName = $(this).attr('table-column-name');
            let fieldValue="";
            
            if (dataType == "") {
                fieldValue = $(this).val();
            }
            else if (dataType == "image") {
                const imageFile = $(this).find('input').prop('files')[0];
                const formData = new FormData();
                formData.append('icon_file', imageFile);
                formData.append('store_path', storePath);

                const imageFilePromise = new Promise((resolve, reject) => {
                    $.ajax({
                        url: "/admin/seo/icon/save",
                        type : "POST",
                        data : formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType : 'json',
                        success: response => {
                            fieldValue = response.store_path;
                            data[`${tableColumnName}`] = fieldValue;
                            resolve(fieldValue);
                        },
                        error: (e)=>reject(e),
                    });
                });
                imagesPrimises.push(imageFilePromise);
            }
            data[`${tableColumnName}`] = fieldValue;
        });

        await Promise.all(imagesPrimises);
        
        $.ajax({
            url: "/admin/seo/save",
            type : "PUT",
            data: {params : data},
            success: response => {
                window.messages.Success('Layout params saved.');
            },
            error: (e)=>console.warn('error', e),
        });
    }

    SaveWebmasterParams() {
        let data = {};
        $('#collapse_WebMaster_Params *[table-data]').each(function() {
            const tableColumnName = $(this).attr('table-column-name');
            const fieldValue = $(this).val();
            data[`${tableColumnName}`] = fieldValue;
        });

        console.log(data);

        $.ajax({
            url: "/admin/seo/save",
            type : "PUT",
            data: {params : data},
            success: response => {
                window.messages.Success('Webmaster params saved.');
            },
            error: (e)=>console.warn('error', e),
        });
    }

    LoadSEOParams() {
        $.ajax({
            url: "/admin/seo/load",
            type : "GET",
            success: response => {
                // console.debug(response.params);
                for(const key of Object.keys(response.params)) {
                    const value = response.params[`${key}`];
                    $(`#collapse_SEO_Params *[table-data][table-column-name="${key}"]`).val(value);
                }
            },
            error: (e)=>console.warn('error', e),
        });
    }

    LoadLayoutParams() {
        $.ajax({
            url: "/admin/seo/load",
            type : "GET",
            success: response => {
                // console.debug(response.params);
                for(const key of Object.keys(response.params)) {
                    const value = response.params[`${key}`];
                    $(`#collapse_Layout_Params *[table-data][table-column-name="${key}"]`).val(value);
                }

                const favIconPath = response.params['store_favicon'];
                const favIconInput = $(`#collapse_Layout_Params [table-data][table-column-name="store_favicon"] input`);
                if (favIconPath != "" && favIconInput.length == 1){
                    imageSetPreview(favIconInput, `/public/${favIconPath}`);
                }

                const logoIconPath = response.params['store_logo'];
                const logoIconInput = $(`#collapse_Layout_Params [table-data][table-column-name="store_logo"] input`);
                if (logoIconPath != "" && logoIconInput.length == 1){
                    imageSetPreview(logoIconInput, `/public/${logoIconPath}`);
                }

                for(const key of Object.keys(response.params)) {
                    if (key.indexOf('social_link') != -1 && key.indexOf('_store') != -1){
                        const value = response.params[`${key}`];
                        // console.debug(`${key} => ${value}`);

                        const socialPath = value;
                        const socialInput = $(`#collapse_Layout_Params [table-data][table-column-name="${key}"] input`);
                        if (socialPath != "" && socialInput.length == 1){
                            imageSetPreview(socialInput, `/public/${socialPath}`);
                        }
                    }
                }
            },
            error: (e)=>console.warn('error', e),
        });
    }

    LoadWebmasterParams() {
        $.ajax({
            url: "/admin/seo/load",
            type : "GET",
            success: response => {
                // console.debug(response.params);
                for(const key of Object.keys(response.params)) {
                    const value = response.params[`${key}`];
                    $(`#collapse_WebMaster_Params *[table-data][table-column-name="${key}"]`).val(value);
                }
            },
            error: (e)=>console.warn('error', e),
        });
    }

    ToggleSectionInfo(event) {
        const element = $(event.currentTarget);
        element.find('.section-header-collapse').toggleClass('down');
        element.parent().find('.section-item').toggleClass('hide');
    }

}

class AdminCatalog {

    constructor() {
        console.log(this.constructor.name);
        this.token = $('meta[name="csrf-token"]').attr('content');
        this.MakeCatalog();
        this.MakeKeys();
    }


    MakeCatalogKeys() {

        $('.add-button.add-catalog').off('click');
        $('.add-button.add-catalog').on('click', ()=>{
            $('#catalogWindow .base-data').val('');
            $('.catalog-go-link').hide();
            
            $('#catalogWindow').offcanvas('show');
            
            $('#catalogWindow .accordion-body').collapse('hide');

            if (!$('button#catalog_list_header').hasClass('collapsed')){
                $('button#catalog_list_header').trigger('click');
            }

            $('#catalogWindow').attr('parent_id', $(`#items-catalog .item-label.selected`).attr('category-id'));
            $('#catalogWindow').attr('item_id', $(`#items-catalog .item-label.selected`).attr('item-id'));
            $('#catalogWindow').attr('category_id', $(`#category-title`).attr('category-id'));
            $('#catalogWindow .list-group .list-group-item').removeClass('active');

            const id = $('#catalogWindow').attr('category_id');
            $(`#catalogWindow .list-group .list-group-item[category_id="${id}"]`).addClass('active');

            const categoryName = $(`#items-catalog .item-label.selected`).prop('innerHTML');
            const newName = $('#catalog_list_header').prop('innerHTML').split('-')[0] + ' - ' + categoryName.toLowerCase();
            $('#catalog_list_header').prop('innerHTML', newName);

            this.MakeCatalogModalKeys();
        });

        $('.add-button.add-item').off('click');
        $('.add-button.add-item').on('click', ()=>{
            const listItem = $('.item-label.selected');
            // console.debug(listItem);
            if (listItem.hasClass('statistics')){
                console.debug('statistics');
            }
            else {
                $('#productsList').offcanvas('show');
            
                $('#productsList .accordion-body').collapse('hide');
    
                if (!$('button#catalog_list_header').hasClass('collapsed')){
                    $('button#catalog_list_header').trigger('click');
                }
    
                //*
                $.ajax({
                    url: "/admin/products/short",
                    type : "GET",
                    data: {
                        _token : $('meta[name="csrf-token"]').attr('content'),
                    },
                    success: response => {
                        const list = JSON.parse(response).list;
                        let listHTML = ``;
                        
                        // console.debug(this.itemsInCategory);

                        for(const item of list){
                            if (this.itemsInCategory?.indexOf(`${item.id}`) < 0 || this.itemsInCategory == null || this.itemsInCategory == undefined) {
                                const photos = item['Фото товара'].split(';');
                                let photo = ImageNoPhotoPath;
                                let photoBorder = '';
                                if (photos[0] != ''){
                                    let name = photos[0];
                                    photo = `${name}`;
                                    //photo = `http://konsol-stol.ru/${name}`;
                                    photoBorder = 'border: 1px solid #0000001F; object-fit: cover;';
                                }
        
                                const active = (item['Включен'] == '+') ? 'checked' : '';
                                listHTML += `
                                    <div item-id="${item.id}" class="table-item w-100 d-flex flex-row justify-content-between align-items-center p-2" draggable="false">
                                        <div class="column-check"><input class="form-check-input" type="checkbox" value="" item-id="${item.id}"></div>
                                        <div class="column-articul">${item['Артикул']}</div>
                                        <div class="column-image"><img src="${photo}" style="width: 50px; height:50px; ${photoBorder}"></div>
                                        <div class="column-name flex-grow-1">${item['Наименование']}</div>
                                        <div class="column-price">${item['Цена']} руб</div>
                                        <div class="column-quantity">0</div>
                                        <div class="column-activity">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" ${active} disabled>
                                            </div>
                                        </div>
                                    </div>
                                `;
                            }
                        }
                        $('#productsList .table-items .table-items-body').empty().append(listHTML);
    
                    },
                    error: (e)=>console.warn('error', e),
                });
                //*/
    
                $('#productsList').attr('parent_id', $('.item-wrapper .item-label.selected').attr('category-id'));
                $('#productsList').attr('category_id', $(`#category-title`).attr('category-id'));
                $('#productsList .list-group .list-group-item').removeClass('active');
    
                const id = $('#productsList').attr('category_id');
                $(`#productsList .list-group .list-group-item[category_id="${id}"]`).addClass('active');
    
                const categoryName = $(`#productsList .list-group .list-group-item[category_id="${id}"]`).prop('innerHTML');
                const newName = $('#product_list_header').prop('innerHTML').split('-')[0] + ' - ' + categoryName.toLowerCase();
                $('#parentCatalog').prop('innerHTML', categoryName.toLowerCase());
                $('#product_list_header').prop('innerHTML', newName);
    
                this.MakeProductModalKeys();
            }
        });

    }

    MakeTableDragKeys() {

        // #region item dragging functions
        $('.table-item').attr('draggable', 'true');

        $('.table-item').off('mousedown');
        $('.table-item').on('mousedown', ()=>{
            if ($(event.target).hasClass('item-drag')){
                this._itemStartDragg = true;
            }
        });

        $('.table-item').off('dragstart');
        $('.table-item').on('dragstart', (event)=>{
            if (!this._itemStartDragg){
                event.preventDefault();
                return;
            }

            $(event.target).addClass(`dragging`);
        });

        $('.table-item').off('dragend');
        $('.table-item').on('dragend', (event)=>{
            $(event.target).removeClass(`dragging`);
            this._itemStartDragg = false;
            this.UpdateProductsOrders();
        });

        const getItemNextElement = (cursorPosition, currentElement) => {
            const currentElementCoord = currentElement.getBoundingClientRect();
            const currentElementCenter = currentElementCoord.y + currentElementCoord.height / 2;

            const nextElement   = (cursorPosition < currentElementCenter)
                                ? currentElement
                                : currentElement.nextElementSibling;

            return nextElement;
        };

        $('.table-item').off('dragover');
        $('.table-item').on('dragover', (event)=>{
            event.preventDefault();

            const activeElement = $(`.dragging`)[0];
            const currentElement = $(event.target);
            const isMoveable = activeElement !== currentElement && currentElement.hasClass('table-item');
              
            if (!isMoveable) {
              return;
            }

            const nextElement = getItemNextElement(event.clientY, event.target);

            if ((nextElement && activeElement === nextElement.previousElementSibling) || (activeElement === nextElement)) {
                return;
            }
            
            if (nextElement) {
                nextElement.before(activeElement);
            }
            else {
                $('.table-item').last().after(activeElement);
            }

        });
        // #endregion

    }

    MakeListKeys() {

        const that = this;

        $('.item-wrapper .item-label').off('click');
        $('.item-wrapper .item-label').on('click', function(){
            if ($(`#category-panel`).attr('style') != undefined){
                $(`#category-panel`).attr('style', $(`#category-panel`).attr('style').replace('; display: none!important',''));
            }

            $('.item-label.selected').removeClass('selected');
            $(this).addClass('selected');
            const categeoryId = $(this).attr('category-id');
            that.UpdateWorkPanel(categeoryId);
        });

        $('.item-extender').off('click');
        $('.item-extender').on('click', (event)=>{
            const element = $(event.target);
            if (element.parent().hasClass('item-extender')){
                element.parent().toggleClass('extended');
                const childs = element.parent().parent().next();
                if (childs.hasClass('item-childs')){
                    childs.toggleClass('extended');

                    const exHeight = childs.hasClass('extended') ? `${childs.prop('scrollHeight')}px` : '0px';
                    childs.css('height', exHeight);
                }

                parent = element.parent().parent().parent().parent();
                if (parent.hasClass('item-childs')) {
                    setTimeout(()=>{
                        let summHeight = 0;
                        parent.children().each((index, element)=>{
                            summHeight += $(element).prop('scrollHeight');
                        });

                        const exHeight = parent.hasClass('extended') ? `${summHeight}px` : '0px';
                        parent.css('height', exHeight);
                    }, 500);
                }
            }
        });

    }

    ProductGalleryKeys() {
        $('.gallery .img-thumbnail').attr('draggable', 'true');

        $('.gallery .img-thumbnail').off('mousedown');
        $('.gallery .img-thumbnail').on('mousedown', (event)=>{
            if ($(event.target).hasClass('img-thumbnail')){
                this._thumbStartDragg = true;
            }
        });

        $('.gallery .img-thumbnail').off('dragstart');
        $('.gallery .img-thumbnail').on('dragstart', (event)=>{
            if (!this._thumbStartDragg){
                event.preventDefault();
                return;
            }

            $(event.target).addClass(`dragging`);
        });

        $('.gallery .img-thumbnail').off('dragend');
        $('.gallery .img-thumbnail').on('dragend', (event)=>{
            $(event.target).removeClass(`dragging`);
            this._thumbStartDragg = false;
        });

        const getImgNextElement = (cursorPosition, currentElement) => {
            const currentElementCoord = currentElement.getBoundingClientRect();
            const currentElementCenter = currentElementCoord.x + currentElementCoord.width / 2;

            const nextElement   = (cursorPosition < currentElementCenter)
                                ? currentElement
                                : currentElement.nextElementSibling;

            return nextElement;
        };

        $('.gallery .img-thumbnail').off('dragover');
        $('.gallery .img-thumbnail').on('dragover', (event)=>{
            event.preventDefault();

            const activeElement = $(`.dragging`)[0];
            const currentElement = $(event.target);
            const isMoveable = activeElement !== currentElement && currentElement.hasClass('img-thumbnail');
            
            if (!isMoveable) return;

            const nextElement = getImgNextElement(event.clientX, event.target);

            if ((nextElement && activeElement === nextElement.previousElementSibling) || (activeElement === nextElement)) {
                return;
            }
            
            if (nextElement) {
                nextElement.before(activeElement);
            }
            else {
                $('.gallery .img-thumbnail').last().after(activeElement);
            }
        });
    }

    MakePanelKeys() {
        const that = this;

        // #region card dragging functions
        $('.category-card').attr('draggable', 'true');

        $('.category-card').off('mousedown');
        $('.category-card').on('mousedown', (event)=>{
            if ($(event.target).hasClass('category-card-drag')){
                this._cardStartDragg = true;
            }
        });

        $('.category-card').off('dragstart');
        $('.category-card').on('dragstart', (event)=>{
            if (!this._cardStartDragg){
                event.preventDefault();
                return;
            }

            $(event.target).addClass(`dragging`);
        });

        $('.category-card').off('dragend');
        $('.category-card').on('dragend', (event)=>{
            $(event.target).removeClass(`dragging`);
            this._cardStartDragg = false;
            this.UpdateCategoryOrders();
        });

        const getCardNextElement = (cursorPosition, currentElement) => {
            const currentElementCoord = currentElement.getBoundingClientRect();
            const currentElementCenter = currentElementCoord.x + currentElementCoord.width / 2;

            const nextElement   = (cursorPosition < currentElementCenter)
                                ? currentElement
                                : currentElement.nextElementSibling;

            return nextElement;
        };

        $('.category-card').off('dragover');
        $('.category-card').on('dragover', (event)=>{
            event.preventDefault();

            const activeElement = $(`.dragging`)[0];
            const currentElement = $(event.target);
            const isMoveable = activeElement !== currentElement && currentElement.hasClass('category-card');
            
            if (!isMoveable) return;

            // const nextElement = (currentElement === activeElement.nextElementSibling) ?
            // currentElement.nextElementSibling :
            // currentElement;

            const nextElement = getCardNextElement(event.clientX, event.target);

            if ((nextElement && activeElement === nextElement.previousElementSibling) || (activeElement === nextElement)) {
                return;
            }
            
            if (nextElement) {
                nextElement.before(activeElement);
            }
            else {
                $('.category-card').last().after(activeElement);
            }
        });
        // #endregion

        // #region card keys functions
        $('.category-card-edit').off('click');
        $('.category-card-edit').on('click', (event)=>{
            const categeoryId = $(event.target).attr('category_id');

            $.ajax({
                url: `/admin/category/info/${categeoryId}`,
                type : "POST",
                data: {
                    _token : $('meta[name="csrf-token"]').attr('content'),
                },
                success: response => {
                    const categoryInfo = JSON.parse(response).data[0];

                    $('#category-title').val(categoryInfo.category_title);
                    $('#category-title-H1').val(categoryInfo.category_title_h1);
                    $('#CategoryUseDefaultMeta').prop('checked', (categoryInfo.category_use_default_meta == 1) );
                    updateMetaCheckers();

                    const categoryImage = (categoryInfo.category_image != null) ? `${categoryInfo.category_image}` : ImageNoPhotoPath;
                    $('#catalog-image').attr('src', `/public/${categoryImage}`);

                    $('#catalogWindow #category_name').val(categoryInfo.category_name);
                    $('.catalog-go-link').show();
        
                    $('#catalogWindow').offcanvas('show');
                    
                    $('#catalogWindow .accordion-body').collapse('hide');
        
                    if (!$('button#catalog_list_header').hasClass('collapsed')){
                        $('button#catalog_list_header').trigger('click');
                    }
        
                    $('#catalogWindow').attr('parent_id', categoryInfo.parent_id);
                    $('#catalogWindow').attr('category_id', categoryInfo.category_id);
                    $('#catalogWindow .list-group .list-group-item').removeClass('active');

                    $('#catalogWindow #category_url').val(categoryInfo.url);
                    $('#catalogWindow #categoryDescription').val(categoryInfo.description);
        
                    $(`#catalogWindow .list-group .list-group-item[category_id="${categoryInfo.parent_id}"]`).addClass('active');
                    $(`#catalogWindow .list-group .list-group-item[category_id="${categoryInfo.category_id}"]`).remove();
        
                    $('#catalogWindow #activityChecked').prop('checked', categoryInfo.category_active == '1' ? true : false);

                    const categoryName = $(`#catalogWindow .list-group .list-group-item.active`).prop('innerHTML');
                    const newName = $('#catalog_list_header').prop('innerHTML').split('-')[0] + ' - ' + categoryName.toLowerCase();
                    $('#catalog_list_header').prop('innerHTML', newName);
        
                    $('#catalogWindow .list-group .list-group-item').off('click');
                    $('#catalogWindow .list-group .list-group-item').on('click', (event)=>{
                        $('#catalogWindow .list-group .list-group-item').removeClass('active');
                        $(event.target).addClass('active');
        
                        const categoryName = $(`#catalogWindow .list-group .list-group-item.active`).prop('innerHTML');
                        const newName = $('#catalog_list_header').prop('innerHTML').split('-')[0] + ' - ' + categoryName.toLowerCase();
                        $('#catalog_list_header').prop('innerHTML', newName);
                    });

                    $('#catalogWindow #catalog-accept-button').off('click');
                    $('#catalogWindow #catalog-accept-button').on('click', ()=>{
                        $.ajax({
                            url: `/admin/category/save/${categoryInfo.category_id}`,
                            type : "PUT",
                            data: {
                                _token                    : $('meta[name="csrf-token"]').attr('content'),
                                parent_id                 : $(`#catalogWindow .list-group .list-group-item.active`).attr('category_id'), 
                                category_active           : $('#catalogWindow #activityChecked').prop('checked') ? '1' : '0', 
                                category_name             : $('#catalogWindow #category_name').val(),
                                url                       : $('#catalogWindow #category_url').val(),
                                description               : $('#catalogWindow #categoryDescription').val(),
                                category_title            : $('#catalogWindow #category-title').val(),
                                category_title_h1         : $('#catalogWindow #category-title-H1').val(),
                                category_use_default_meta : $('#CategoryUseDefaultMeta').prop('checked') ? 1 : 0,
                            },
                            success: response => {
                                $('#catalogWindow').offcanvas('hide');
                                console.debug('Saved', response);
                                this.UpdateList();
                            },
                            error: (e)=>console.warn('error', e),
                        });
            
                    });

                    $('#catalogWindow #catalog-image-button').off('click');
                    $('#catalogWindow #catalog-image-button').on('click', ()=>{
                        let sendData = new FormData();
                        sendData.append('_token', $('meta[name="csrf-token"]').attr('content'));
                        sendData.append('category_id', categoryInfo.category_id);
                        sendData.append('image', $('#catalog-image-file')[0].files[0]);
                        
                        console.debug(sendData);

                        $.ajax({
                            url  : `/admin/category/image/upload`,
                            type : "POST",
                            contentType: false,
                            processData: false,
                            data : sendData,
                            success: response => {
                                $('#catalogWindow').offcanvas('hide');
                                console.debug('Saved', response);
                                this.UpdateList();
                            },
                            error: (e)=>console.warn('error', e),
                        });
            
                    });

                },
                error: (e)=>console.warn('error', e),
            });
            
        });

        $('.category-card-close').off('click');
        $('.category-card-close').on('click', (event)=>{
            const categeoryId = $(event.target).attr('category_id');
            
            if (!confirm('Удалить категорию')) return;


            console.debug('delete - ', categeoryId);

            $.ajax({
                url: `/admin/category/delete/${categeoryId}`,
                type : "DELETE",
                data: {
                    _token : $('meta[name="csrf-token"]').attr('content'),
                },
                success: response => {
                    this.UpdateList();
                },
                error: (e)=>console.warn('error', e),
            });
            
        });

        $('.category-card-image').off('click');
        $('.category-card-image').on('click', function() {

            const currentCategory = $(`.item-wrapper .item-label.selected`);
            const extender = currentCategory.parent().find('.item-extender');
            const childs = currentCategory.parent().next();

            if (!extender.hasClass('extended')){
                extender.addClass('extended');
                childs.addClass('extended');
                const exHeight = `${childs.prop('scrollHeight')}px`;
                childs.css('height', exHeight);
            }

            const categoryId = $(this).parent().attr('category_id');
            // console.debug(childs, categoryId);
            
            $('.item-wrapper .item-label').removeClass('selected');
            $(`.item-wrapper .item-label[category-id="${categoryId}"`).addClass('selected');

            that.UpdateWorkPanel(categoryId);
        });
        // #endregion

        // #region products keys functions
        $('.item-card-close').off('click');
        $('.item-card-close').on('click', (event)=>{
            if (confirm('Удалить товар из категории ?')){
                const itemId = $(event.target).attr('item-id');
                const categoryId = $(event.target).attr('category-id');
                $.ajax({
                    url: `/admin/product/category/delete`,
                    type : "DELETE",
                    data: {
                        _token : $('meta[name="csrf-token"]').attr('content'),
                        parent_id : categoryId,
                        product_id : itemId,
                    },
                    success: response => {
                        this.UpdateList(false);
                        $(event.target).parent().parent().remove();

                        let index = this.itemsInCategory.indexOf(`${itemId}`);
                        if (index >= 0) {
                            this.itemsInCategory.splice(index, 1);
                        }

                        console.debug(`Товар с id - ${itemId} удален из категории с id - ${categoryId}`);
                    },
                    error: (e)=>console.warn('error', e),
                });
            }
        });

        $('.table-item .column-name').off('click');
        $('.table-item .column-name').on('click', async (event)=>{
            const itemId = $(event.target).parent().attr('item-id');
            $('.base-data').val('');

            $('#productEdit').offcanvas('show');
            $('#productEdit').attr('item-id', itemId);

            const loadView = new Promise((resolve, reject) => {
                $.ajax({
                    url: `/admin/product/edit/form`,
                    type : "POST",
                    data: { _token : $('meta[name="csrf-token"]').attr('content'), },
                    success : (response) => {

                        const newFormBody = $(response).find('.offcanvas-body');
                        $('#productEdit .offcanvas-body').replaceWith(newFormBody);
                        updateMetaCheckers();
                        resolve();
                    },
                    error : (e)=>{reject()}
                });
            });
    
            await loadView;

            $.ajax({
                url: `/admin/products/info/${itemId}`,
                type : "GET",
                data: { _token : $('meta[name="csrf-token"]').attr('content'), },
                success: response => {
                    const item = JSON.parse(response).data[0];
                    $('#productEdit #productName').prop('innerHTML', item['Наименование']);

                    console.debug(item);
                    $('#products-title').val(item['products_title']);
                    $('#products-title-H1').val(item['products_title_h1']);
                    $('#products-meta').val(item['products_meta']);
                    $('#products-desc').val(item['products_desc']);
                    $('#ProductUseDefaultMeta').prop('checked', (item['products_use_default_meta'] == 1) );
                    updateMetaCheckers();

                    // console.debug(`Товар с id - ${itemId}`, item);
                    $('#productEdit .base-data').each((index, element) => {
                        const nodeName = $(element).prop('nodeName');
                        const bdColumn = $(element).attr('bd-column');
                        const elementType = $(element).attr('type');
                        if (elementType == "text"){
                            $(element).val(item[`${bdColumn}`]);
                        }
                        if (elementType == "checkbox"){
                            $(element).prop('checked', (item[`${bdColumn}`] == "+") ? true : false);
                        }
                        if (nodeName == "TEXTAREA") {
                            if ($(element).val() != ""){
                                $(element).css('height', $(element).prop('scrollHeight') + 5);
                            }
                            else {
                                $(element).css('height', '38');
                            }
                        }
                    });

                    $('#accordionImages .gallery').empty();
                    const photos = item['Фото товара'].split(';');
                    if (photos.length > 0 && photos[0] != ""){
                        for(const photo of photos){
                            const photoURL = `${photo}`;
                            //const photoURL = `http://konsol-stol.ru/${photo}`;
                            $('#accordionImages .gallery').append(`
                                <img src="${photoURL}" baseURL="${photo}" class="img-thumbnail shadow m-2" draggable="true" style="width: 150px; height: 150px;"/>
                            `);
                        }

                        this.ProductGalleryKeys();
                    }
                },
                error: (e)=>console.warn('error', e),
            });
        });

        $('#panel-table-items-header-check').off('input');
        $('#panel-table-items-header-check').on('input', function(){
            const headerCheck = $('#panel-table-items-header-check').prop('checked');

            $('#header-menu-check').css('display', headerCheck ? 'block' : 'none');
            $('.header-main-content').css('display', headerCheck ? 'none' : 'block');

            const checkedList = $('#product-panel .table-items-body .column-check input');
            checkedList.each((index, element)=>{
                const productId = $(element).parent().parent().attr('item-id');
                if (productId != undefined){
                    $(element).prop('checked', headerCheck);
                }
            });
        });

        $('#product-panel .table-items-body input').off('input');
        $('#product-panel .table-items-body input').on('input', function(){
            const check = ($(`#product-panel .column-check input:checked`).length > 0);

            $('#header-menu-check').css('display', check ? 'block' : 'none');
            $('.header-main-content').css('display', check ? 'none' : 'block');
        });

        $('#product-panel .column-activity input').off('input');
        $('#product-panel .column-activity input').on('input', function(){
            const itemId = $(this).parent().parent().parent().attr('item-id');
            // console.debug($(this).prop('checked'), itemId);

            const savedData = new Map();
            savedData.set('Включен', $(this).prop('checked') ? '+' : '-');

            $.ajax({
                url: `/admin/products/save/${itemId}`,
                type : "PUT",
                data: { 
                    _token : $('meta[name="csrf-token"]').attr('content'), 
                    savedData : Array.from(savedData),
                },
                success: response => {
                    messages.Success('Данные сохранены успешно.');
                },
                error: (e)=>{ 
                    console.warn('error', e)
                    messages.Danger('Ошибка сохранения данных.');
                },
            });
        });

        $('#del-all-from-catalog').off('click');
        $('#del-all-from-catalog').on('click', ()=>{
            const parentId = $('#items-catalog .item-label.selected').attr('category-id');
            const checkedList = $('#product-panel .table-items-body .column-check input:checked');

            const checkedArray = [];
            checkedList.each((index, element)=>{
                const productId = $(element).parent().parent().attr('item-id');
                if (productId != undefined){
                    checkedArray.push({ parent_id : parentId, product_id : productId });
                }
            });

            console.debug(`Delete from ${parentId}`, checkedArray);
            $.ajax({
                url: `/admin/products/category/delete`,
                type : "DELETE",
                data: {
                    _token : $('meta[name="csrf-token"]').attr('content'),
                    checkedArray : checkedArray,
                },
                success: response => {
                    this.UpdateList();
                },
                error: (e)=>console.warn('error', e),
            });
        });

        // #endregion

        $('#category-go-link').off('click');
        $('#category-go-link').on('click', function() {
            const link = $(this).attr('link');
            window.open(link);
        });

        $('.catalog-go-link').off('click');
        $('.catalog-go-link').on('click', function() {
            const link = $('#catalogWindow #category_url').val();
            window.open(`/categories/${link}`);
        });

    }

    MakeCatalogModalKeys() {
        //#region catalogWindow functions
        $('#catalogWindow .translate').off('click');
        $('#catalogWindow .translate').on('click', () => {
            const categoryName = $('#category_name').val();
            if (categoryName != ''){
                const url = translit(categoryName);
                $('#category_url').val(url);
            }
        });

        $('#catalogWindow .list-group .list-group-item').off('click');
        $('#catalogWindow .list-group .list-group-item').on('click', (event)=>{
            $('#catalogWindow .list-group .list-group-item').removeClass('active');
            $(event.target).addClass('active');

            const categoryName = $(`#catalogWindow .list-group .list-group-item.active`).prop('innerHTML');
            const newName = $('#catalog_list_header').prop('innerHTML').split('-')[0] + ' - ' + categoryName.toLowerCase();
            $('#catalog_list_header').prop('innerHTML', newName);
        });

        $('#catalogWindow #catalog-accept-button').off('click');
        $('#catalogWindow #catalog-accept-button').on('click', ()=>{
            const categoryName = $('#catalogWindow #category_name').val();
            const categoryParent = $(`#catalogWindow .list-group .list-group-item.active`).attr('category_id');

            $.ajax({
                url: "/admin/categories/new",
                type : "POST",
                data: {
                    _token               : $('meta[name="csrf-token"]').attr('content'),
                    parent_id            : categoryParent, 
                    category_active      : $('#catalogWindow #activityChecked').prop('checked') ? '1' : '0', 
                    category_name        : categoryName,
                    category_url         : $('#catalogWindow #category_url').val(),
                    category_description : $('#catalogWindow #categoryDescription').val(),
                },
                success: response => {
                    const id = JSON.parse(response).id;
                    $('#catalogWindow').offcanvas('hide');
                    
                    const itemHTML = `
                        <div class="item-wrapper category-item d-flex flex-column">
                            <div class="item-name-wrapper d-flex flex-row">
                                <div category-id="${id}" class="item-label">${categoryName}</div><div class="item-counter ms-auto me-2">7/8</div>
                                <div class="item-extender"><img src="/public/images/caret-down.svg"></div>
                            </div>
                            <div parent-id="${id}" class="item-childs d-flex flex-column justify-content-start ps-3"></div>
                        </div>
                    `;

                    $(`div[parent-id="${categoryParent}"]`).append(itemHTML);
                    $('.item-childs:empty').parent().find('.item-counter').removeClass('me-2').addClass('me-4');
                    $('.item-childs:empty').parent().find('.item-extender').css('display', 'none');
        
                    this.UpdateList();
                    console.debug('Created', response);
                },
                error: (e)=>console.warn('error', e),
            });

        });
        //#endregion
    }

    MakeProductModalKeys() {
        //#region productsList functions
        $('#productsList .list-group .list-group-item').off('click');
        $('#productsList .list-group .list-group-item').on('click', (event)=>{
            $('#productsList .list-group .list-group-item').removeClass('active');
            $(event.target).addClass('active');

            const categoryName = $(`#items-catalog .item-label.selected`).prop('innerHTML');
            const newName = $('#product_list_header').prop('innerHTML').split('-')[0] + ' - ' + categoryName.toLowerCase();
            $('#product_list_header').prop('innerHTML', newName);
            $('#parentCatalog').prop('innerHTML', categoryName.toLowerCase());
        });

        $('#productsList #product-accept-button').off('click');
        $('#productsList #product-accept-button').on('click', ()=>{
            const categoryParent = $(`#productsList .list-group .list-group-item.active`).attr('category_id');
            // console.debug('accept', categoryParent);

            const checkedList = $('.column-check input[item-id]:checked');

            let list = [];
            checkedList.each((index, element)=>{
                const productId = $(element).attr('item-id');
                if (productId != undefined){
                    list.push(productId);
                }
            });

            // console.debug(list, list.length);

            let promises = [];
            while (list.length > 0) {
                let chunk = [];
                for (let i = 0; i < 300; i++){
                    if (list.length > 0){
                        chunk.push(list.pop());
                    }
                }

                promises.push(new Promise((resolve, reject) => {
                    $.ajax({
                        url: "/admin/products/add",
                        type : "PUT",
                        data: {
                            '_token'          : $('meta[name="csrf-token"]').attr('content'),
                            'category_parent' : categoryParent,
                            'products'        : chunk, 
                        },
                        success: response => {
                            resolve();
                        },
                        error: (e)=>console.warn('error', e),
                    });
                }));

                Promise.all(promises)
                .then(()=>{
                    this.UpdateList();
                    $('#productsList').offcanvas('hide');
                });
            }
            
        });

        $('#productsList #table-header-check').off('input');
        $('#productsList #table-header-check').on('input', ()=>{
            const headerCheck = $(`#productsList #table-header-check`).prop('checked');
            console.debug(headerCheck);
            const checkedList = $('#productsList .column-check input[item-id]');
            checkedList.each((index, element)=>{
                const productId = $(element).attr('item-id');
                if (productId != undefined){
                    $(element).prop('checked', headerCheck);
                }
            });
        });

        $('.product-go-link').off('click');
        $('.product-go-link').on('click', function() {
            const link = $('#productEdit input[bd-column="URL адрес"]').val();
            if (link) window.open(`/product/${link}`);
        });

        $('#productEdit .translate').off('click');
        $('#productEdit .translate').on('click', () => {
            const categoryName = $('#product_name').val();
            if (categoryName != ''){
                const url = translit(categoryName);
                $('#product_url').val(url);
            }
        });

        $('#productEdit #product-save-button').off('click');
        $('#productEdit #product-save-button').on('click', () => {
            const itemId = $('#productEdit').attr('item-id');
            // console.debug(itemId);
            
            const savedData = new Map();
            $('#productEdit .base-data').each((index, element) => {
                const nodeName = $(element).prop('nodeName');
                const bdColumn = $(element).attr('bd-column');
                const elementType = $(element).attr('type');

                if (elementType == "text"){
                    savedData.set(`${bdColumn}`, $(element).val());
                }
                if (elementType == "checkbox"){
                    savedData.set(`${bdColumn}`, $(element).prop('checked') ? '+' : '-');
                }
            });

            let photos = [];
            $('.gallery .img-thumbnail').each((index, element) => {
                photos.push($(element).attr('baseUrl'));
            });

            savedData.set('Фото товара', photos.join(';'));

            savedData.set('products_title', $('#products-title').val());
            savedData.set('products_title_h1', $('#products-title-H1').val());
            savedData.set('products_meta', $('#products-meta').val());
            savedData.set('products_desc', $('#products-desc').val());
            savedData.set('products_use_default_meta', $('#ProductUseDefaultMeta').prop('checked') ? 1 : 0);

            $.ajax({
                url: `/admin/products/save/${itemId}`,
                type : "PUT",
                data: { 
                    _token : $('meta[name="csrf-token"]').attr('content'), 
                    savedData : Array.from(savedData),
                },
                success: response => {
                    // console.debug(JSON.parse(response));
                    messages.Success('Данные сохранены успешно.');
                    $('#productEdit').offcanvas('hide');
                    this.UpdateWorkPanel();
                },
                error: (e)=>{ 
                    console.warn('error', e)
                    messages.Danger('Ошибка сохранения данных.');
                },
            });
        });

        //#endregion
    }

    MakeModalKeys() {
        this.MakeCatalogModalKeys();
        this.MakeProductModalKeys();
    }

    MakeStatisticKeys() {
        $('.item-label.statistic-1').on('click', () => {
            $('.item-label.selected').removeClass('selected');
            $('.item-label.statistic-1').addClass('selected');
            console.debug('Все товары');
            $.ajax({
                url: "/admin/products/list?page=1",
                type : "GET",
                data: {},
                success: response => {
                    console.debug(response);
                    const items = response.data;
                    $(`#category-panel`).attr('style', $(`#category-panel`).attr('style') + '; ' + 'display: none!important');

                    let itemsHTML = ``;
                    if (items.length > 0){
                        for(const item of items){
                            const photos = item['Фото товара'].split(';');
                            let photo = ImageNoPhotoPath;
                            let photoBorder = '';
                            if (photos[0] != ''){
                                let name = photos[0];
                                photo = `${name}`;
                                //photo = `http://konsol-stol.ru/${name}`;
                                photoBorder = 'border: 1px solid #0000001F; object-fit: cover;';
                            }
        
                            const active = (item['Включен'] == '+') ? 'checked' : '';
        
                            itemsHTML += `
                                <div item-id="${item.id}" class="table-item w-100 d-flex flex-row align-items-center p-2" draggable="true">
                                    <div class="column-drag"><img src="/public/images/drag-button.svg" class="item-drag" draggable="false"></div>
                                    <div class="column-check"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></div>
                                    <div class="column-articul" title="${item['Артикул']}">${item['Артикул']}</div>
                                    <div class="column-image"><img src="${photo}" style="width: 50px; height:50px; ${photoBorder}"></div>
                                    <div class="column-name flex-grow-1" title="${item['Наименование']}">${item['Наименование']}1</div>
                                    <div class="column-price">${item['Цена']} руб</div>
                                    <div class="column-quantity">0</div>
                                    <div class="column-order">0</div>
                                    <div class="column-activity">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" ${active}>
                                        </div>
                                    </div>
                                    <div class="column-delete"><img item-id="${item.id}" src="/public/images/close-button.svg" class="item-card-close"></div>
                                </div>
                            `;
                        }
                        $(`#product-panel .table-items-body`).empty().append(itemsHTML);
                        $(`#product-panel .area-contnet`).show();
                        $('.column-drag').hide();
                        $('.column-check').hide();
                        $('.column-order').hide();
                        this.MakePanelKeys();
                    }
                    else {
                        $(`#product-panel .area-contnet`).hide();
                    }
                },
                error: (e)=>console.warn('error', e),
            });

        });

        $('.item-label.statistic-2').on('click', () => {
            $('.item-label.selected').removeClass('selected');
            $('.item-label.statistic-2').addClass('selected');
            console.debug('Товары без категории');
        });
    }

    MakeKeys() {
        this.MakeCatalogKeys();
        this.MakeTableDragKeys();
        this.MakeModalKeys();
        this.MakeStatisticKeys();
    }

    UpdateList(updateWorkPanel = true) {
        const extendedItems = $('.item-extender.extended');

        let currentCategory = 0;
        const selectedItem = $('#items-catalog .item-label.selected');
        if (selectedItem.length > 0) {
            currentCategory = selectedItem.attr('category-id');
        }

        const categoriesList = ()=>$.post({
            url: "../admin/categories",
            data: { '_token' : this.token, },
            success: (response)=>{
                try { 
                    makeList(JSON.parse(response).data); 
                }
                catch(e) {
                    console.warn('Пришел не JSON', e, response);
                }
            },
            error: (e)=>console.warn('error', e),
        });
        categoriesList();

        const makeList = list => {
            const that = this;

            let itemsHTML = ``;
            for(const category of list){
                itemsHTML += `
                    <div parent-id="${category.parent_id}" class="item-wrapper category-item d-flex flex-column">
                        <div class="item-name-wrapper d-flex flex-row">
                            <div category-id="${category.category_id}" class="item-label">${category.category_name}</div><div class="item-counter ms-auto me-2">--/--</div>
                            <div category-id="${category.category_id}" class="item-extender"><img src="/public/images/caret-down.svg"></div>
                        </div>
                        <div parent-id="${category.category_id}" class="item-childs d-flex flex-column justify-content-start ps-3"></div>
                    </div>
                `;
            }
            $('.main-childs').empty().append(itemsHTML);

            $('.item-wrapper').each((index, element) => {
                const parentId = $(element).attr('parent-id');
                $(`.item-childs[parent-id="${parentId}"]`).append($(element));
            });

            this.MakeListKeys();
            $(`#items-catalog .item-label[category-id="${currentCategory}"]`).addClass('selected');
            $('.item-childs:empty').parent().find('.item-counter').removeClass('me-2').addClass('me-4');
            $('.item-childs:empty').parent().find('.item-extender').css('display', 'none');

            if (updateWorkPanel){
                this.UpdateWorkPanel(currentCategory);
            }
        
            extendedItems.each((index, element)=>{
                const categeoryId = $(element).attr('category-id');
                $(`.item-extender[category-id="${categeoryId}"]`).addClass('extended');
                const childs = $(`.item-childs[parent-id="${categeoryId}"]`).addClass('extended');
                const exHeight = childs.hasClass('extended') ? `${childs.prop('scrollHeight')}px` : '0px';
                childs.css('height', exHeight);
            });

            makeListCounters();
        }

        // подсчет количества товаров в категориях
        const makeListCounters = () => {
            const that = this;
            $('.item-label[category-id]').each((index, element) => {
                const parent = $(element).parent();
                const categoryId = $(element).attr('category-id');

                let itemsCount = new Promise((resolve, reject)=>$.ajax({
                    url: `/admin/products/parent/${categoryId}`,
                    type : "GET",
                    data: { '_token' : this.token, },
                    success: (response)=>{
                        const items = JSON.parse(response).list;
                        let count = 0;
                        for(const item of items){
                            if (item['Включен'] == "+") {
                                count ++;
                            }
                        }
                        resolve(`${count}/${items.length}`);
                    },
                    error: (e)=>reject(e),
                }));

                itemsCount
                .then(
                    result => {
                        // console.debug($(element).prop('innerHTML'), categoryId, result);
                        const countField = parent.find('.item-counter');
                        countField.empty().append(result);
                    }
                );
            });

            let productsCount = new Promise((resolve, reject)=>$.ajax({
                url: `/admin/products/short`,
                type : "GET",
                data: { '_token' : this.token, },
                success: (response)=>{
                    const items = JSON.parse(response).list;
                    let count = 0;
                    for(const item of items){
                        if (item['Включен'] == "+") {
                            count ++;
                        }
                    }
                    resolve(`${count}/${items.length}`);
                },
                error: (e)=>reject(e),
            }));

            productsCount
            .then(
                result => {
                    const countField = $('.statistics.statistic-1').parent().find('.item-counter');
                    countField.empty().append(result);
                }
            );

            let notCategoryCount = new Promise((resolve, reject)=>$.ajax({
                url: `/admin/products/notcategory`,
                type : "GET",
                data: { '_token' : this.token, },
                success: (response)=>{
                    const items = response.list;
                    let [count, countIn] = [0, 0];
                    for(const item in items){
                        countIn += (items[`${item}`]['Включен'] == "+") ? 1 : 0;
                        count++;
                    }
                    resolve(`${countIn}/${count}`);
                },
                error: (e)=>reject(e),
            }));

            notCategoryCount
            .then(
                result => {
                    const countField = $('.statistics.statistic-2').parent().find('.item-counter');
                    countField.empty().append(result);
                }
            );
        }
    }

    UpdateWorkPanel(categoryId = 0) {
        const selectedItem = $('.item-wrapper .item-label.selected');

        const subCategoriesList = ()=>$.ajax({
            url: `../admin/category/parent/${selectedItem.attr('category-id')}`,
            type : "POST",
            data: { '_token' : this.token, },
            success: (response)=>{
                try {
                    const subList = JSON.parse(response).data;
                    const mainCategory = JSON.parse(response).category;
                    let itemsHTML = ``;
                    for(const subCategory of subList){
                        const activity = (subCategory.category_active == '0') ? ' filter:grayscale(1);' : '';
                        const image = (subCategory.category_image != null) ? `${subCategory.category_image}` : ImageNoPhotoPath;
                        itemsHTML += `
                            <div category_id="${subCategory.category_id}" class="category-card d-flex flex-column align-items-center border p-1 m-2" style="width: 200px;${activity}" draggable="true">
                                <div class="category-card-header d-flex flex-row p-1 w-100">
                                    <img category_id="${subCategory.category_id}" src="/public/images/drag-button.svg" class="category-card-drag" draggable="false">
                                    <img category_id="${subCategory.category_id}" src="/public/images/edit-button.svg" class="category-card-edit ms-auto me-2">
                                    <img category_id="${subCategory.category_id}" src="/public/images/close-button.svg" class="category-card-close">
                                </div>
                                <div class="category-card-image d-flex flex-row p-1 justify-content-center align-items-center" style="height:150px; width:150px;">
                                    <img src="/public/${image}" style="width: 150px; height:150px; object-fit: contain;">
                                </div>
                                <div class="category-card-label d-flex flex-row w-100 p-1">
                                    <input category_id="${subCategory.category_id}" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label ms-2" for="flexCheckDefault">${subCategory.category_name}</label>
                                </div>
                            </div>
                        `;
                    }
                    $(`.area-content`).empty().append(itemsHTML);
                    $(`#category-title`).empty().append($('.item-wrapper .item-label.selected')[0].innerHTML);
                    $(`#category-title`).attr('category-id', categoryId);

                    let categoryURL = "/category";
                    if (mainCategory.length > 0){
                        categoryURL = `/categories/${mainCategory[0].category_url}`;
                    }

                    $('#category-go-link').attr('link', categoryURL);

                    itemsList();
                }
                catch(e) {
                    console.warn('Пришел не JSON', e, response);
                }
            },
            error: (e)=>console.warn('error', e),
        });

        const itemsList = ()=>$.ajax({
            url: `/admin/products/parent/${selectedItem.attr('category-id')}`,
            type : "GET",
            data: { '_token' : this.token, },
            success: (response)=>{
                const items = JSON.parse(response).list;
                // console.debug(items);
                //*
                let itemsHTML = ``;
                const categoryId = selectedItem.attr('category-id');
                if (items.length > 0){
                    this.itemsInCategory = [];
                    for(const item of items){
                        
                        this.itemsInCategory.push(`${item.product_id}`);

                        const photos = item['Фото товара'].split(';');
                        let photo = ImageNoPhotoPath;
                        let photoBorder = '';
                        if (photos[0] != ''){
                            let name = photos[0];
                            photo = `${name}`;
                            //photo = `http://konsol-stol.ru/${name}`;
                            photoBorder = 'border: 1px solid #0000001F; object-fit: cover;';
                        }
    
                        const active = (item['Включен'] == '+') ? 'checked' : '';
    
                        itemsHTML += `
                            <div item-id="${item.product_id}" class="table-item w-100 d-flex flex-row align-items-center p-2" draggable="true">
                                <div class="column-drag"><img src="/public/images/drag-button.svg" class="item-drag" draggable="false"></div>
                                <div class="column-check"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></div>
                                <div class="column-articul" title="${item['Артикул']}">${item['Артикул']}</div>
                                <div class="column-image"><img src="${photo}" style="width: 50px; height:50px; ${photoBorder}"></div>
                                <div class="column-name flex-grow-1" title="${item['Наименование']}">${item['Наименование']}1</div>
                                <div class="column-price">${item['Цена']} руб</div>
                                <div class="column-quantity">0</div>
                                <div class="column-order">0</div>
                                <div class="column-activity">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" ${active}>
                                    </div>
                                </div>
                                <div class="column-delete"><img item-id="${item.product_id}" category-id=${categoryId} src="/public/images/close-button.svg" class="item-card-close"></div>
                            </div>
                        `;
                    }
                    $(`#product-panel .table-items-body`).empty().append(itemsHTML);
                    $(`#product-panel .area-contnet`).show();
                }
                else {
                    $(`#product-panel .area-contnet`).hide();
                }
                //*/
                this.MakePanelKeys();
                this.MakeTableDragKeys();
            },
            error: (e)=>console.warn('error', e),
        });

        subCategoriesList();
        $(`#panel-table-items-header-check`).prop('checked', false);
        $('#header-menu-check').css('display', 'none');
        $('.header-main-content').css('display', 'block');

    }

    MakeCatalog() {
        this.UpdateList();
    }

    UpdateCategoryOrders() {
        const orders = [];
        $('.category-card').each((index, element) => {
            const id = $(element).attr('category_id');
            orders.push({id : id, index : index});
        });

        $.ajax({
            url: "/admin/categories/orders",
            type : "PUT",
            data: { orders : orders, },
            success: response => {
                this.UpdateList(false);
            },
            error: (e)=>console.warn('error', e),
        });
    }

    UpdateProductsOrders() {
        const orders = [];
        $('.table-item').each((index, element) => {
            const id = $(element).attr('item-id');
            orders.push({id : id, index : index});
        });

        $.ajax({
            url: "/admin/products/orders",
            type : "PUT",
            data: { orders : orders, },
            success: response => {
                // this.UpdateList(false);
            },
            error: (e)=>console.warn('error', e),
        });
    }

}

class AdminProperties {

    // непустые - SELECT * FROM `catalog` WHERE `catalog`.`Свойство: Ширина` IS NOT NULL AND `catalog`.`Свойство: Ширина` <> ''
    // переименовать столбец - ALTER TABLE `catalog` CHANGE `Цена` `Цена2` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;
    // вставка столбца - ALTER TABLE `catalog` ADD `Свойство: новое` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL AFTER `Свойство: Цена`;
    // удаление столбца - ALTER TABLE `catalog` DROP `Свойство: Тест`;


    constructor() {
        console.log(this.constructor.name);
        this.token = $('meta[name="csrf-token"]').attr('content');
        this.MakeKeys();
    }

    MakeKeys() {
        const that = this;

        // #region item dragging functions
        $('.table-property-item').attr('draggable', 'true');

        $('.table-property-item').off('mousedown');
        $('.table-property-item').on('mousedown', (event)=>{
            if ($(event.target).hasClass('item-drag')){
                this._itemStartDragg = true;
            }
        });

        $('.table-property-item').off('dragstart');
        $('.table-property-item').on('dragstart', (event)=>{
            if (!this._itemStartDragg){
                event.preventDefault();
                return;
            }

            $(event.target).addClass(`dragging`);
        });

        $('.table-property-item').off('dragend');
        $('.table-property-item').on('dragend', (event)=>{
            $(event.target).removeClass(`dragging`);
            this._itemStartDragg = false;
            this.UpdatePropertiesOrders();
        });

        const getItemNextElement = (cursorPosition, currentElement) => {
            const currentElementCoord = currentElement.getBoundingClientRect();
            const currentElementCenter = currentElementCoord.y + currentElementCoord.height / 2;

            const nextElement   = (cursorPosition < currentElementCenter)
                                ? currentElement
                                : currentElement.nextElementSibling;

            return nextElement;
        };

        $('.table-property-item').off('dragover');
        $('.table-property-item').on('dragover', (event)=>{
            event.preventDefault();

            const activeElement = $(`.dragging`)[0];
            const currentElement = $(event.target);
            const isMoveable = activeElement !== currentElement && currentElement.hasClass('table-property-item');
              
            if (!isMoveable) {
              return;
            }

            const nextElement = getItemNextElement(event.clientY, event.target);

            if ((nextElement && activeElement === nextElement.previousElementSibling) || (activeElement === nextElement)) {
                return;
            }
            
            if (nextElement) {
                nextElement.before(activeElement);
            }
            else {
                $('.table-property-item').last().after(activeElement);
            }

        });
        // #endregion

        $('.add-property').off('click');
        $('.add-property').on('click', function() {
            $('#propertyEdit .property-go-link').hide();
            $('#propertyEdit').offcanvas('show');
            $('#propertyEdit').attr('item-id', '-1');
            $('#propertyName').prop('innerHTML', '...');
            $('#propertyNameInput').val('');
        });

        $('.property-edit').off('click');
        $('.property-edit').on('click', function() {
            $('#propertyEdit .property-go-link').show();
            $('#propertyEdit').offcanvas('show');
            const item = $(this).parent().parent();
            
            const itemId = item.attr('item-id');
            $('#propertyEdit').attr('item-id', itemId);

            const itemName = item.find('.property-name').prop('innerHTML');
            $('#propertyName').prop('innerHTML', itemName);
            $('#propertyNameInput').val(itemName);

            console.debug(itemId, itemName);
        });

        $('.property-value-edit').off('click');
        $('.property-value-edit').on('click', function() {
            const item = $(this).parent().parent();
            
            const itemInput = item.find('.property-value-name input');
            $('.property-value-name input').attr('disabled','');
            itemInput.removeAttr('disabled');
            const itemValue = itemInput.prop('value');
            
            itemInput.focus();
            // let tmpStr = itemInput.val();
            // itemInput.val('');
            // itemInput.val(tmpStr);

            $('.property-value-name input').off('blur')
            itemInput.blur(function() {
                $(this).attr('disabled','');
            });

            console.debug(itemValue);
        });


        $('.property-delete').off('click');
        $('.property-delete').on('click', function() {
            const item = $(this).parent().parent();
            const itemName = item.find('.property-name').prop('innerHTML');
            if (confirm('Удалить свойство?')) {
                $.ajax({
                    url: "/admin/properties/delete",
                    type : "DELETE",
                    data: { columnName : `Свойство: ${itemName}`, },
                    success: response => that.UpdatePropertiesList(),
                    error: (e)=>console.warn('error', e),
                });
            }
        });

        $('.property-list').off('click');
        $('.property-list').on('click', function() {
            const item = $(this).parent().parent();
            const itemName = item.find('.property-name').prop('innerHTML');
            // console.debug(`Найдем все "Свойство: ${itemName}"`);

            $.ajax({
                url: "/admin/properties/valuesForm",
                type : "GET",
                data: { propertyName : `Свойство: ${itemName}`, },
                success: response => {
                    
                    const newHeader = $(response).find('.offcanvas-header');
                    $('#propertyValues .offcanvas-header').replaceWith(newHeader);

                    const newBody = $(response).find('.offcanvas-body');
                    $('#propertyValues .offcanvas-body').replaceWith(newBody);

                    that.MakeKeys();
                    $('#propertyValues').offcanvas('show');
                },
                error: (e)=>console.warn('error', e),
            });
        });

        $('#property-values-save-button').off('click');
        $('#property-values-save-button').on('click', function() {
            let propertiesToAdd = [];
            let propertiesToDel = [];
            $('.property-value-show-tag input').each(function(index, element){
                const property = $('#propertyValuesLabel').prop('innerHTML');
                const value = $(element).parent().parent().parent().find('.property-value-name input').prop('value');
                const checked = $(element).prop('checked');
                const propertyUrl = `${translit(property)}=${translit(value)}`;

                if (checked) {
                    propertiesToAdd.push({
                        property_name  : property, 
                        property_value : value, 
                        property_url   : propertyUrl,
                    });
                }
                else {
                    propertiesToDel.push({
                        property_url   : propertyUrl,
                    });
                }
            });

            $.ajax({
                url: "/admin/tags",
                type : "PUT",
                data: { tags : propertiesToAdd, },
                success: response => {
                    $('#propertyValues').offcanvas('hide');
                },
                error: (e)=>console.warn('error', e),
            });

            $.ajax({
                url: "/admin/tags",
                type : "DELETE",
                data: { tags : propertiesToDel, },
                success: response => {
                    $('#propertyValues').offcanvas('hide');
                },
                error: (e)=>console.warn('error', e),
            });
            
            messages.Success('Данные сохранены.');
            // $('#propertyValues').offcanvas('hide');
        });

        $('#property-save-button').off('click');
        $('#property-save-button').on('click', function() {
            const propertyName = $('#propertyNameInput').val();
            if (propertyName == ''){
                $('#propertyEdit').offcanvas('hide');
            }

            const itemId = $('#propertyEdit').attr('item-id');
            console.debug(itemId);
            if (itemId == '-1') {
                $.ajax({
                    url: "/admin/properties/add",
                    type : "PUT",
                    data: { newName : `Свойство: ${propertyName}`, },
                    success: response => {
                        messages.Success('Данные сохранены.');
                        $('#propertyEdit').offcanvas('hide');
                        that.UpdatePropertiesList();
                    },
                    error: (e)=>console.warn('error', e),
                });
            }
            else {
                const oldName = $('#propertyName').prop('innerHTML');
                $.ajax({
                    url: "/admin/properties/rename",
                    type : "PUT",
                    data: { 
                        columnName : `Свойство: ${oldName}`,
                        newName    : `Свойство: ${propertyName}`, 
                    },
                    success: response => {
                        messages.Success('Данные сохранены.');
                        $('#propertyEdit').offcanvas('hide');
                        that.UpdatePropertiesList();
                    },
                    error: (e)=>console.warn('error', e),
                });
            }
        });

        $('.table-property-item .property-show-filter input').off('input');
        $('.table-property-item .property-show-filter input').on('input', function(){
            const item = $(this).parent().parent().parent();
            const itemId = item.attr('item-id');
            const check = $(this).prop('checked');
            $.ajax({
                url: `/admin/properties/filter/${itemId}`,
                type : "PUT",
                data: { inFilter : (check) ? "1" : "0", },
                success: response => {},
                error: (e)=>console.warn('error', e),
            });
        });

        $('.table-property-item .property-show-card input').off('input');
        $('.table-property-item .property-show-card input').on('input', function(){
            const item = $(this).parent().parent().parent();
            const itemId = item.attr('item-id');
            const check = $(this).prop('checked');
            $.ajax({
                url: `/admin/properties/card/${itemId}`,
                type : "PUT",
                data: { inCard : (check) ? "1" : "0", },
                success: response => {messages.Success('Данные сохранены.')},
                error: (e)=>console.warn('error', e),
            });
        });
    }

    UpdatePropertiesOrders() {
        const orders = [];
        $('.table-property-item').each((index, element) => {
            const id = $(element).attr('item-id');
            orders.push({id : id, index : index});
        });

        $.ajax({
            url: "/admin/properties/orders",
            type : "PUT",
            data: { orders : orders, },
            success: response => {
                // this.UpdateList(false);
            },
            error: (e)=>console.warn('error', e),
        });
    }

    UpdatePropertiesList() {
        $.ajax({
            url: "/admin/properties/list",
            type : "GET",
            success: response => {
                const newList = $(response).find('.table-items-body');
                $('#nav-properties .table-items-body').replaceWith(newList);
                this.MakeKeys();
            },
            error: (e)=>console.warn('error', e),
        });
    }

}

class AdminTags {

    constructor() {
        console.log(this.constructor.name);
        this.token = $('meta[name="csrf-token"]').attr('content');
        this.MakeKeys();
    }

    MakeKeys() {
        const that = this;

        $('.tag-edit').off('click');
        $('.tag-edit').on('click', function() {
            $('#tagEdit .tag-go-link').show();
            $('#tagEdit').offcanvas('show');
            const item = $(this).parent().parent();
            
            const itemUrl = item.attr('item-url');
            $('#tagEdit').attr('item-url', itemUrl);

            const itemName = item.find('.tag-name').prop('innerHTML');
            const itemValue = item.find('.tag-value').prop('innerHTML');
            $('#tagName').prop('innerHTML', `${itemName} - ${itemValue}`);

            $.ajax({
                url: `/admin/tags/info/${itemUrl}`,
                type : "GET",
                data: { 
                    _token : $('meta[name="csrf-token"]').attr('content'),
                },
                success: response => {
                    const tag = response.tag;

                    $('#nameForTag').val(tag.tag_alias);
                    // $('#h1ForTag').val(tag.tag_alias_h1);
                    $('#urlForTag').val(tag.property_url);
                    $('#tagDescription').val(tag.tag_desc);
                    $('#tags-default-title').val(tag.tags_default_title);
                    $('#tags-default-title-H1').val(tag.tags_default_title_h1);
                    $('#tags-default-meta').val(tag.tags_default_meta);
                    $('#TagUseDefaultMeta').prop('checked', tag.tag_use_default_meta == 1);

                    $('#tag-image-file').val(null);

                    if (tag.tag_image != '' && tag.tag_image != null){
                        $('#tag-image').attr('src', tag.tag_image);
                    }
                    else {
                        $('#tag-image').attr('src', ImageNoPhotoPath);
                    }
                    updateMetaCheckers();
                },
                error: (e)=>{ 
                    console.warn('error', e)
                    messages.Danger('Ошибка загрузки данных.');
                },
            });

        });

        $('.tag-go-link').off('click');
        $('.tag-go-link').on('click', function() {
            const link = $('#tagEdit').attr('item-url');
            window.open(`/tags/${link}`);
        });

        // #region item dragging functions
        $('.table-tag-item').attr('draggable', 'true');

        $('.table-tag-item').off('mousedown');
        $('.table-tag-item').on('mousedown', (event)=>{
            if ($(event.target).hasClass('item-drag')){
                this._itemStartDragg = true;
            }
        });

        $('.table-tag-item').off('dragstart');
        $('.table-tag-item').on('dragstart', (event)=>{
            if (!this._itemStartDragg){
                event.preventDefault();
                return;
            }

            $(event.target).addClass(`dragging`);
        });

        $('.table-tag-item').off('dragend');
        $('.table-tag-item').on('dragend', (event)=>{
            $(event.target).removeClass(`dragging`);
            this._itemStartDragg = false;
            this.UpdateTagsOrders();
        });

        const getItemNextElement = (cursorPosition, currentElement) => {
            const currentElementCoord = currentElement.getBoundingClientRect();
            const currentElementCenter = currentElementCoord.y + currentElementCoord.height / 2;

            const nextElement   = (cursorPosition < currentElementCenter)
                                ? currentElement
                                : currentElement.nextElementSibling;

            return nextElement;
        };

        $('.table-tag-item').off('dragover');
        $('.table-tag-item').on('dragover', (event)=>{
            event.preventDefault();

            const activeElement = $(`.dragging`)[0];
            const currentElement = $(event.target);
            const isMoveable = activeElement !== currentElement && currentElement.hasClass('table-tag-item');
              
            if (!isMoveable) {
              return;
            }

            const nextElement = getItemNextElement(event.clientY, event.target);

            if ((nextElement && activeElement === nextElement.previousElementSibling) || (activeElement === nextElement)) {
                return;
            }
            
            if (nextElement) {
                nextElement.before(activeElement);
            }
            else {
                $('.table-tag-item').last().after(activeElement);
            }

        });
        // #endregion

        $('#tagEdit #tag-save-button').off('click');
        $('#tagEdit #tag-save-button').on('click', () => {
            const itemUrl = $('#tagEdit').attr('item-url');

            $.ajax({
                url: `/admin/tags/save/${itemUrl}`,
                type : "PUT",
                data: { 
                    _token : $('meta[name="csrf-token"]').attr('content'), 
                    savedData : {
                        'tag_alias'            : $('#nameForTag').val(),
                        // 'tag_alias_h1'         : $('#h1ForTag').val(),
                        'tag_desc'             : $('#tagDescription').val(),
                        'tag_use_default_meta' : $('#TagUseDefaultMeta').prop('checked') ? 1 : 0,
                        'tags_default_title'   : $('#tags-default-title').val(),
                        'tags_default_title_h1': $('#tags-default-title-H1').val(),
                        'tags_default_meta'    : $('#tags-default-meta').val(),
                    }
                },
                success: response => {
                    messages.Success('Данные сохранены успешно.');
                    // $('#tagEdit').offcanvas('hide');
                },
                error: (e)=>{ 
                    console.warn('error', e)
                    messages.Danger('Ошибка сохранения данных.');
                },
            });
        });

        $('#tagEdit #tag-image-button').off('click');
        $('#tagEdit #tag-image-button').on('click', ()=>{
            let sendData = new FormData();
            sendData.append('_token', $('meta[name="csrf-token"]').attr('content'));
            sendData.append('property_url', $('#tagEdit').attr('item-url'));
            sendData.append('image', $('#tag-image-file')[0].files[0]);
            
            console.debug(sendData);

            $.ajax({
                url  : `/admin/tags/image/upload`,
                type : "POST",
                contentType: false,
                processData: false,
                data : sendData,
                success: response => {
                    $('#tag-image').attr('src', response.image_path);
                    // $('#tagEdit').offcanvas('hide');
                    // this.UpdateList();
                },
                error: (e)=>console.warn('error', e),
            });

        });
    }

    UpdateTagsOrders() {
        const orders = [];
        $('.table-tag-item').each((index, element) => {
            const url = $(element).attr('item-url');
            orders.push({property_url : url, index : index});
        });

        $.ajax({
            url: "/admin/tags/orders",
            type : "PUT",
            data: { orders : orders, },
            success: response => {
                // this.UpdateList(false);
            },
            error: (e)=>console.warn('error', e),
        });
    }
}

class AdminPanel {

    _cardStartDragg = false;
    _itemStartDragg = false;

    constructor() {
        console.log(this.constructor.name);
        this.token = $('meta[name="csrf-token"]').attr('content');

        this.CheckVisible();
        this.MakeTextEditor();

        this.LoadOrders();
       
        new AdminCatalog();
        new AdminProperties();
        new AdminTags();
        new AdminSEO();
        new AdminExport();

        this.MakeKeys();

        // #region test

        // const categoriesList = ()=>$.post({
        //     url: "../admin/category/parent/0",
        //     data: { '_token' : this.token, },
        //     success: (response)=>{
        //         try { 
        //             console.info(JSON.parse(response).data); 
        //         }
        //         catch(e) {
        //             console.warn('Пришел не JSON', e, response);
        //         }
        //     },
        //     error: (e)=>console.warn('error', e),
        // });
        // categoriesList();

        // console.debug($.fn.jquery);
        // const token = $('meta[name="csrf-token"]').attr('content');
        // const listener = ()=>$.post({
        //     url: "../test/get",
        //     data: {
        //         '_token'   : token,
        //         'email'    : '123',
        //         'password' : '123',
        //     },
        //     success: (response)=>{
        //         try {
        //             const json = JSON.parse(response);
        //             console.debug(json['server_answer']);
        //         }
        //         catch(e) {console.warn('Пришел не JSON', e, response);}
        //     },
        //     error: (e)=>console.warn('error', e),
        //     complete: ()=>{
        //         // setTimeout(()=>{
        //         //     listener();
        //         // }, 1000);
        //     },
        // });
        // listener();
        // #endregion

        $('button[role="tab"]').each((index, triggerEl) => {
            const tabTrigger = new bootstrap.Tab(triggerEl);
            // console.debug(triggerEl);
        });

        $.ajax({
            url     : "/admin/condition/activetab",
            type    : "GET",
            data    : {},
            success : response => {
                const activeTab = JSON.parse(response).activeTab;
                if (activeTab != '') {
                    const triggerTab = $(`#${activeTab}`);
                    bootstrap.Tab.getInstance(triggerTab).show()
                }
            },
            error   : e => console.debug("Ошибка", e)
        });

        messages.Success('Добро пожаловать.');

    }

    CheckVisible() {
        const page = $("#services-pages-select").val();
        if (page == "-1") {
            $(".categories").css("display", "none");
        } else {
            $(".categories").css("display", "block");
        }
    }

    MakeKeys() {
        updateMetaCheckers();

        $("#services-pages-select").on("change", () => {
            console.log(
                "selection changed !!!",
                $("#services-pages-select").val()
            );

            const page = $("#services-pages-select").val();
            const editor = $(`.categories .nicEdit-main`);
            editor[0].innerHTML = "";

            this.CheckVisible();

            if (page == "-1") return;

            try {
                window.query.Post(
                    `api/services/pagecontent/${page}`,
                    { token: window.api_token /* "zone_id" : "63465",*/ },
                    (data) => {
                        // console.info(data);
                        editor[0].innerHTML = data;
                    },
                    false
                );
            } catch (e) {
                console.warn(e);
            }
        });

        $(".textEditorShow").on("click", () => {
            const page = $("#services-pages-select").val();
            if (page != "-1") {
                window.open(`service/${page}`, "_blank");
            }
        });

        $(".textEditorSave").on("click", () => {
            const page = $("#services-pages-select").val();
            const editor = $(`.categories .nicEdit-main`);
            if (page != "-1") {
                try {
                    window.query.Post(
                        `api/services/pagecontent/${page}/save`,
                        {
                            token: window.api_token,
                            content: editor[0].innerHTML,
                        },
                        (data) => {
                            console.info(data);
                        },
                        false
                    );
                } catch (e) {
                    console.warn(e);
                }
            }
        });

        $("#nav-orders-logs").on("click", (event) => {
            // alert('Pressed', event.target);
            const nodeName = $(event.target)[0].nodeName;

            let expandElement = null;
            let arrowElement = null;
            switch (nodeName) {
                case "IMG":
                    if ($(event.target).parent().hasClass('expand-button')){
                        expandElement = $(event.target).parent().parent().parent().find('.item-row-expand');
                        arrowElement = $(event.target).parent();
                    }
                    break;
                case "DIV":
                    if ($(event.target).hasClass('expand-button')){
                        expandElement = $(event.target).parent().parent().find('.item-row-expand');
                        arrowElement = $(event.target);
                    }
                    break;
                default:
                    break;
            }
            if (expandElement == null) return;

            arrowElement.toggleClass('active');
            if (arrowElement.hasClass('active')){
              const expandHeight = expandElement.prop("scrollHeight");
              expandElement.css('height', `${expandHeight}px`);
              expandElement.css('opacity', '1');
            }
            else {
              expandElement.css('height', '0');
              expandElement.css('opacity', '0');
            }
      
        });

        $('button[data-bs-toggle="tab"]').on('shown.bs.tab', event => {
            // event.target; // newly activated tab
            // event.relatedTarget; // previous active tab
            // console.debug('changed', $(event.target).attr('id'), $(event.relatedTarget).attr('id'));
            $.ajax({
                url     : "/admin/condition/activetab",
                type    : "PUT",
                data    : { activeTab :  $(event.target).attr('id') },
                success : response => {},
                error   : e => console.debug("Ошибка", e)
            });
        });

    }

    MakeTextEditor() {
        bkLib.onDomLoaded(function () {
            new nicEditor({ fullPanel: true }).panelInstance(
                "textEditArea-categories"
            );
            $(".nicEdit-panelContain").parent().width("auto");
            $(".nicEdit-panelContain").parent().next().width("auto");
            $(".nicEdit-main").width("auto");
            $(".nicEdit-main").height("auto");
            $(".nicEdit-main").css("min-height", "600px");
            $(".nicEdit-main").css("padding", "10px");
        });
    }

    LoadOrders() {
        try {
            window.query.Post(
                "/api/orders",
                {
                    token: window.api_token,
                },
                (data) => {
                    const orders = JSON.parse(data);
                    // console.table(orders);

                    const maxOrders = orders.length;
                    let expandCounter = 0;

                    const loadExpand = () => {
                        if (expandCounter >= maxOrders) return;
                        const order = orders[expandCounter++];
                    
                        const itemElement = $(
                            `.item-row-expand-${order.id}`
                        );

                        // console.info(order);

                        try {
                            window.query.Post(
                                `api/order/products`,
                                { token: window.api_token, order_hash : order.order_hash, },
                                (data) => {

                                    let productsList = JSON.parse(data);
                                    
                                    if (productsList.length > 0) {
                                        let content = `<table class="orders-table" cellspacing="0">`;

                                        let fullSumm = 0;

                                        content += `<tr><th>Наименование</th><th>Количество</th><th>Общая стоимость</th><tr>`;

                                        for(const product of productsList){
                                            content += `<tr>`;
                                            const summ = parseInt(product['quantity']) * parseInt(product['Цена']);
                                            fullSumm += summ;
                                            content += `<td>${product['Наименование']}</td><td>${product['quantity']} шт.</td><td>${summ} руб</td>`;
                                            content += `</tr>`;
                                        }

                                        content += `</table>`;
                                        content += `<div class="summery">Всего на сумму: ${fullSumm} руб</div>`;

                                        itemElement.append(content);
                                    }
                                },
                                false
                            );
                        } catch (e) {
                            console.warn(e);
                        }
                        setTimeout(()=>{loadExpand()}, 100);
                    };
                    loadExpand();
                },
                false
            );
        } catch (e) {
            console.warn(e);
        }
    }

}
//----------------------------------------------------------------------------------------------------------
//#endregion tabs classes
//----------------------------------------------------------------------------------------------------------


import { ComponentsManager } from './libs/components_manager.js';
import { Query }             from './libs/query.js';
import { Messages }          from './libs/messages.js';
import { Utils }             from './libs/utils.js';

window.componentsManager = ComponentsManager;
window.query = new Query();
window.messages = new Messages();
window.utils = new Utils();

window.updateMetaCheckers = function(){

    const checkDisplayProperty = function(){
        const useFor = $(this).attr('use-for');
        const checked = $(this).prop('checked');

        if (checked) {
            $(`#${useFor}`).css('display', 'none');
        }
        else {
            $(`#${useFor}`).css('display', 'flex');
        }
    }

    $('.meta-checkbox').off('change');
    $('.meta-checkbox').each(checkDisplayProperty);
    $('.meta-checkbox').on('change', checkDisplayProperty);
}

window.adminPanel = new AdminPanel();