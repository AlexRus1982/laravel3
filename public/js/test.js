class TestScript {

    constructor(){
        console.log(this.constructor.name);

        var monthNames = ['Янв', 'Фев', 'Мар', 'Апр'];
        var myVar = monthNames.toString();
        console.debug(myVar);

        const obj = { a : "one", b : "two", a : "three" };
        console.log(obj);

        // $.ajax({
        //     url: "/admin/properties/add",
        //     type : "PUT",
        //     data: { newName : 'Свойство: Тест', },
        //     success: response => console.debug(response),
        //     error: (e)=>console.warn('error', e),
        // });

        // $.ajax({
        //     url: "/admin/properties/rename",
        //     type : "PUT",
        //     data: { 
        //         columnName : 'Свойство: Тест',
        //         newName    : 'Свойство: Тест2',
        //     },
        //     success: response => console.debug(response),
        //     error: (e)=>console.warn('error', e),
        // });


        // $.ajax({
        //     url: "/admin/properties/delete",
        //     type : "DELETE",
        //     data: { columnName : 'Свойство: Тест', },
        //     success: response => console.debug(response),
        //     error: (e)=>console.warn('error', e),
        // });
    }

}

new TestScript();