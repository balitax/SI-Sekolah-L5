angular.module('admin').controller('datastatis', function($scope, $http, $filter, $timeout,blockUI, baseURL) {
    $scope.data = {};
    $scope.alerts = [];
    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };
    $http.get(baseURL.url('api/datastatis')).success(function(data) {
        $scope.data = data;
    })
    $scope.delete = function(id) {
        if (confirm("Anda yakin untuk menghapus data?") === true) {
            $http.delete(baseURL.url('admin/datastatis/' + id)).success(function(data) {
                if (data.success) {
                    $http.get(baseURL.url('api/datastatis')).success(function(data) {
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

angular.module('admin').controller('datastatiscreate', function($scope, $http, $filter, $timeout, baseURL) {
    $scope.data = {};
    $scope.menu = {};
    $scope.alerts = [];
    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };
    $http.get(baseURL.url('api/menu')).success(function(data) {
        $scope.menu = data;
    });
    $scope.submit = function() {
        $scope.data['content'] = CKEDITOR.instances.editor1.getData();
        $http.post(baseURL.url('admin/datastatis'), $scope.data).success(function(data) {
            if (data.success) {
                $scope.alerts.push({type: 'success', msg: 'Data berhasil di simpan. Tunggu sebentar...'});
                $timeout(function () {
                    window.location.replace(baseURL.url('admin/datastatis'));
                },3000);
            }
        }).error(function(e, status) {
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

angular.module('admin').controller('datastatisedit', function($scope, $http, $filter, $timeout, baseURL) {
    $scope.data = {};
    $scope.alerts = [];
    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };

    var id = $filter('_uriseg')(6);
    $http.get(baseURL.url('api/datastatis/') + id).success(function(data) {
        $scope.data = data;
    })

    $scope.submit = function(id) {
        $scope.data['content'] = CKEDITOR.instances.editor1.getData();
        $http.put(baseURL.url('admin/datastatis/') + id, $scope.data).success(function(data) {
            if (data.success) {
                $scope.alerts.push({type: 'success', msg: 'Data berhasil di perbarui. Tunggu sebentar...'});
                $timeout(function() {
                    window.location.replace(baseURL.url('admin/datastatis'));
                }, 3000);
            }
        }).error(function(e, status) {
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
        ;
    }
});
