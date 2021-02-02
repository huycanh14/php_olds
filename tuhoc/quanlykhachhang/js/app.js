'use strict';
var app = angular.module('myApp', [ 'ngMaterial']);

app.controller('Header',  function ($scope) {
	$scope.searchShow = true;
	$scope.showSetting = function(){
		$scope.searchShow = !$scope.searchShow;
	}
});