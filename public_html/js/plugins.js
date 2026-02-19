
// Start Window Load Function
$(window).on('load', function() {

    'use strict';

    //*********************************************
    //  PORTFOLIO OPTIONS
    //*********************************************

        // init cubeportfolio
        $('#portfolio-items').cubeportfolio({
            filters: '#filters',
            loadMoreAction: 'click',
            layoutMode: 'grid',
            mediaQueries: [{
                width: 1500,
                cols: 3
            }, {
                width: 1100,
                cols: 3
            }, {
                width: 900,
                cols: 3
            }, {
                width: 640,
                cols: 2
            }, {
                width: 480,
                cols: 1
            }],
            defaultFilter: '*',
            animationType: 'quicksand',
            gapHorizontal: 10,
            gapVertical: 10,
            gridAdjustment: 'responsive',
            caption: 'zoom',
            displayType: 'sequentially',
            displayTypeSpeed: 150,

        });

    //*********************************************
    //  PORTFOLIO OPTIONS FOR SUBPAGE
    //*********************************************

        // init cubeportfolio
        $('#portfolio-items-subpage').cubeportfolio({
            filters: '#filters',
            loadMoreAction: 'click',
            layoutMode: 'grid',
            mediaQueries: [{
                width: 1500,
                cols: 4
            }, {
                width: 1100,
                cols: 4
            }, {
                width: 900,
                cols: 4
            }, {
                width: 640,
                cols: 2
            }, {
                width: 480,
                cols: 1
            }],
            defaultFilter: '*',
            animationType: 'quicksand',
            gapHorizontal: 10,
            gapVertical: 10,
            gridAdjustment: 'responsive',
            caption: 'zoom',
            displayType: 'sequentially',
            displayTypeSpeed: 150,

        });


// End Function
});
