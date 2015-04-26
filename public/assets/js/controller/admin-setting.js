
angular.module('admin').controller('setting', function($scope, $http, $filter, $timeout, baseURL) {
    $scope.data = {};
    $scope.alerts = [];
    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };

    $http.get(baseURL.url('api/setting/1')).success(function(data) {
        $scope.data = data;
    })
});