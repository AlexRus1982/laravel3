{{-- Список фалов корня --}}
<div id="root-files-list" class="flex-grow-1 border p-2" style="text-align: left;">
    @php
        $dir   = $_SERVER['DOCUMENT_ROOT'] . '/public';
        $files = scandir($dir);
        foreach($files as $file){
            if (is_file("{$dir}/$file")){
                echo "{$file}<br>";
            }
        }
    @endphp
</div>