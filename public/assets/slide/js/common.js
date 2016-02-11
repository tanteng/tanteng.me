window.onload = function() {
    $('.loading').remove();
    $('#fullpage').show().fullpage({
        verticalCentered: false,

        //控制锚和页面切换间效果
        // anchors: ['s1', 's2', 's3', 's4', 's5', 's6', 's7', 's8'],
        // easing: 'easeOutBack',

        //头部底部的滑动衔接
        continuousVertical: true,
        slidesNavigation: true,
        slidesNavPosition: 'bottom',
    });
}
