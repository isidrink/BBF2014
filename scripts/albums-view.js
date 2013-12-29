define(["kendo", "data", "utils", "cart", "albums"], function (kendo, data, utils, cart, albums) {
    var _createAlbumsListView = function () {
        var listViewElement = $("#albums-listview");
        var existingListView = listViewElement.data().kendoMobileListView;
        var viewModel = kendo.observable($.extend({
            albums: data.albumsList,
             beersD: data.beersD
        }, albums.baseAlbumViewModel));

        if(existingListView) {
            existingListView.destroy();
        }

        kendo.bind(listViewElement, viewModel, kendo.mobile.ui);
    };

    return {
        show: function (e) {
            //alert(e.view.params.value);
            /*data.beersD.filter({
                field: "B_Id",
                operator: "eq",
                value: parseInt(e.view.params.value)
            });

            data.beersD.read();*/
            
            var filter = utils.parseQueryStringToObject();
            utils.setViewTitle(e.sender.element, filter.title);
            utils.scrollViewToTop(e.sender.element);

            data.clear(data.albumsList);
            data.albumsList.filter(filter);

            _createAlbumsListView();
        }
    }
});