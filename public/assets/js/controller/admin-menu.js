/**
 * Created by balitax on 19/04/2015.
 */
angular.module('admin').controller('datamenu', function($scope, $http, $filter, $timeout, baseURL) {
    $scope.data = {};
    $scope.alerts = [];
    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };
    $http.get(baseURL.url('api/datamenu')).success(function(data) {
        $scope.data = data;
        $scope.totalItems = $scope.data.length;
        $scope.currentPage = 1;
        $scope.numPerPage = 5;
        $scope.paginate = function(value) {
            var begin, end, index;
            begin = ($scope.currentPage - 1) * $scope.numPerPage;
            end = begin + $scope.numPerPage;
            index = $scope.data.indexOf(value);
            return (begin <= index && index < end);
        };
        $scope.$watch('query', function(query) {
            $scope.data = data;
            $scope.data = $filter('filter')($scope.data, $scope.query);
            $scope.totalItems = $scope.data.length;
            $scope.currentPage = 1;
            $scope.numPerPage = 5;
        }, true);
    })
    $scope.delete = function(id) {
        if (confirm("Anda yakin untuk menghapus data?") === true) {
            $http.delete(baseURL.url('admin/datamenu/') + id).success(function(data) {
                if (data.success) {
                    $http.get(baseURL.url('api/datamenu')).success(function(data) {
                        $scope.data = data;
                        $scope.alerts.push({type: 'danger', msg: 'Data Berhasil Dihapus'});
                        $timeout(function() {
                            $scope.alerts = [];
                        }, 5000);
                    })
                }
            });
        }
    }
});

angular.module('admin').controller('datamenucreate', function($scope, $http, $filter, $timeout, baseURL) {
    $scope.data = {};
    $scope.alerts = [];
    $scope.menu = {};
    $scope.tipemenu = [{'id': '1', 'label': 'Halaman Statis'}, {'id': '2', 'label': 'Halaman Dinamis'},{'id' : '3', 'label': 'Halaman Custom'}];

    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };
    $http.get(baseURL.url('api/datamenu')).success(function(data) {
        $scope.menu = data;
    });
    $scope.submit = function() {
        $http.post(baseURL.url('admin/datamenu'), $scope.data).success(function(data) {
            if (data.success) {
                $scope.alerts.push({'type': "success", 'msg': 'Data Berhasil Di Simpan. Tunggu Sebentar...'});
                $timeout(function () {
                    window.location.replace(baseURL.url('admin/datamenu'));
                },3000);
            }
        }).error(function(e,status) {
            if (status === 422) {
                var x;
                for (x in e) {
                    $scope.alerts.push({'type': "danger", 'msg': (e[x][0])});
                }
                $timeout(function() {
                    $scope.alerts = [];
                }, 5000);
            }
        });
    }
});

angular.module('admin').controller('datamenuedit', function($scope, $http, $filter, $timeout, baseURL) {
    $scope.data = {};
    $scope.alerts = [];
    $scope.menu = {};
    $scope.tipemenu = [{'id': '1', 'label': 'Halaman Statis'}, {'id': '2', 'label': 'Halaman Dinamis'},{'id' : '3', 'label': 'Halaman Custom'}];

    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };

    $http.get(baseURL.url('api/datamenu')).success(function(data) {
        $scope.menu = data;
    });

    var id = $filter('_uriseg')(6);
    $http.get(baseURL.url('api/datamenu/') + id).success(function(data) {
        $scope.data = data;
    })
    $scope.submit = function(id) {
        $http.put(baseURL.url('admin/datamenu/') + id, $scope.data).success(function(data) {
            if (data.success) {
                $scope.alerts.push({'type': "success", 'msg': 'Data Berhasil Di Update. Tunggu Sebentar...'});
                $timeout(function() {
                    window.location.replace(baseURL.url('admin/datamenu'));
                }, 3000);
            }
        }).error(function(e,status) {
            if (status === 422) {
                var x;
                for (x in e) {
                    $scope.alerts.push({'type': "danger", 'msg': (e[x][0])});
                }
                $timeout(function() {
                    $scope.alerts = [];
                }, 5000);
            }
        });
    }
});