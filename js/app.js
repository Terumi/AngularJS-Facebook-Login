var app = angular.module('loginApp', ['FacebookProvider']);
app.run(function ($rootScope) {
    window.fbAsyncInit = function () {
        FB.init({
            appId:'YOUR_APP_ID',
            status:true,
            cookie:true,
            xfbml:true
        });
        
        FB.Event.subscribe('auth.statusChange', function(response) {
            $rootScope.$broadcast("fb_statusChange", {'status': response.status});
        });
    };

    (function (d) {
        var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement('script');
        js.id = id;
        js.async = true;
        js.src = "//connect.facebook.net/en_US/all.js";
        ref.parentNode.insertBefore(js, ref);
    }(document));
});
