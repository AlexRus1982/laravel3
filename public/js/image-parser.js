class ImageParserScript {

    constructor(){
        console.log(this.constructor.name);
        this.StartParsing();
    }

    StartParsing(){
        $('img[image-to-parse]').each(function(){
            const imageId = $(this).attr('image-id');
            const imagePath = $(this).attr('src');
            // console.debug(`${imageId} - ${imagePath}`);

            $.ajax({
                url: "/parser/image/save",
                type : "POST",
                data : {
                    'imageId'   : imageId, 
                    'imagePath' : imagePath, 
                },
                success: response => {
                    // console.debug(response);
                    const imageId = response.imageId;
                    $(`img[image-id="${imageId}"`).parent().remove();
                },
                error: (e)=>console.warn('error', e),
            });
        });
    }
}

new ImageParserScript();