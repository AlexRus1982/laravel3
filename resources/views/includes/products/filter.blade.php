<div 
    class="offcanvas offcanvas-end shadow"
    tabindex="-1"
    parent_id=""
    item-id=""
    id="filterEdit"
    aria-labelledby="filterEditLabel"
    style="width: 600px; box-shadow: 0px 0px 4px #000000;">

    <div class="offcanvas-header border-bottom bg-primary text-white">
        <div class="offcanvas-title fs-5 w-100 d-flex flex-row justify-content-center" id="filterEditLabel">Фильтр</div>
    </div>

    <div class="offcanvas-body p-0">
        <div class="accordion" id="accordionPanelsStayOpenExample">
            <?php
                $columnNames = DB::getSchemaBuilder()
                ->getColumnListing('catalog');

                $counter = 0;
                foreach ($columnNames as $columnName) {
                    if (mb_strpos($columnName, 'Свойство: ') !== false) {
                    
                        ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-heading{{$counter}}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse{{$counter}}" aria-expanded="false" aria-controls="panelsStayOpen-collapse{{$counter}}">
                                        {{str_replace('Свойство: ', '', $columnName)}}
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapse{{$counter}}" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-heading{{$counter}}">
                                    <div class="accordion-body">
                            <!-- <u><b>{{$columnName}}</b></u><br> -->
                        <?

                        $propertyArray = [];
                        $properties = DB::table('catalog')
                        ->select("{$columnName}")
                        ->where([
                            [$columnName, '<>', 'NULL'],
                            [$columnName, '<>', ''],
                        ])
                        ->get();
                
                        foreach ($properties as $property) {
                            $splitArray = explode(';', $property->{$columnName});
                
                            foreach ($splitArray as $splitProperty) {
                                array_push($propertyArray, $splitProperty);
                            }
                        }
                
                        $propertyCollection = collect($propertyArray);
                
                        $uniqCollection = $propertyCollection->countBy();

                        $valuesCounter = count($uniqCollection);

                        foreach ($uniqCollection as $key=>$value) {
                            ?>
                                <div class="form-check d-flex">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label ms-2" for="flexCheckDefault">
                                        {{$key}}
                                    </label>
                                </div>
                            <?
                        }

                        ?></div></div></div><?

                        $counter++;
                    }
                }

            ?>
        </div>
    </div>

    <div class="offcanvas-footer p-2 border-top d-flex justify-content-end">
        <button id="filter-show-button" type="button" class="btn btn-primary w-100">Показать</button>
    </div>

</div>

<style>
    #filterEdit .input-group span:first-child {
        min-width: 120px;
    }
</style>