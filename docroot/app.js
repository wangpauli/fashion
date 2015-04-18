var myApp = angular.module('myApp', ['infinite-scroll']);

myApp.controller('FashionController', function($scope, Fashion) {
    $scope.fashion = new Fashion();
});

myApp.factory('Fashion', function($http) {
    var Fashion = function() {
        this.items = [];
        this.busy = false;
        this.offset = 0;
	this.size = 20;
	this.maxBlurbSize = 32;
    };

    Fashion.prototype.nextPage = function() {
        if (this.busy) return;
        this.busy = true;

        var url = "http://www.fashion.com/api/v1/cards?size=" + this.size + "&offset=" + this.offset;
        $http.get(url).success(function(data) {
            var items = data.results;
            for (var i = 0; i < items.length; i++) {
		// truncate blurb
		if (items[i].blurb.length > this.maxBlurbSize) {
		    items[i].blurb = items[i].blurb.substring(0, this.maxBlurbSize);
		    items[i].blurb += " ...";
		}
                this.items.push(items[i]);
            }
            this.offset += this.size;
            this.busy = false;
        }.bind(this)).error(function(data) {
            window.alert(data.message);
        }.bind(this));
    };

    return Fashion;
});