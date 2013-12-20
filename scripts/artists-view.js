define(["kendo", "data"], function (kendo, data) {
    return {
        viewModel: kendo.observable({
            artists: data.artistsList,
            beers: data.beers,
            beersD:data.beersD
        })
    };
});