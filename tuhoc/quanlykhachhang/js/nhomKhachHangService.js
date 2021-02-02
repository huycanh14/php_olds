app.factory('nhomKhachHangService', ['$http', '$q', function($http, $q) {

	var REST_SERVICE_URI = '../quanlykhachhang/';
 
    var factory = {
    	findAllNhomKhachHang: findAllNhomKhachHang,
        createNhomKhachHang: createNhomKhachHang,
        updateNhomKhachHang: updateNhomKhachHang,
        deleteNhomKhachHang: deleteNhomKhachHang
    };
 
    return factory;
 
    function findAllNhomKhachHang() {
        var deferred = $q.defer();
        $http.get(REST_SERVICE_URI+'nhomkhachhang/read.php')
            .then(
            function (response) {
                deferred.resolve(response.data);
            },
            function(errResponse){
                console.error('Error while fetching nhomkhachhangs');
                deferred.reject(errResponse);
            }
        );
        return deferred.promise;
    }

    function createNhomKhachHang(nhomkhachhang) {
        var config = {
            headers: {
                'content-type': 'application/x-www-form-urlencoded; charset=utf-8'
            }
        }
        var deferred = $q.defer();
        $http.post(REST_SERVICE_URI+'nhomkhachhang/create.php', nhomkhachhang, config)
        .then(
            function (response) {
                deferred.resolve(response.data);
            },
            function(errResponse){
                console.error('Error while creating nhomkhachhang');
                deferred.reject(errResponse);
            }
            );
        return deferred.promise;
    }

    function updateNhomKhachHang(nhomkhachhang) {
        var config = {
            headers: {
                'content-type': 'application/x-www-form-urlencoded; charset=utf-8'
            }
        }
        var deferred = $q.defer();
        $http.post(REST_SERVICE_URI+'nhomkhachhang/update.php', nhomkhachhang, config)
        .then(
            function (response) {
                deferred.resolve(response.data);
            },
            function(errResponse){
                console.error('Error while updating nhomkhachhang');
                deferred.reject(errResponse);
            }
            );
        return deferred.promise;
    }
     
    function deleteNhomKhachHang(nhomkhachhang) {
        var config = {
            headers: {
                'content-type': 'application/x-www-form-urlencoded; charset=utf-8'
            }
        }
        var deferred = $q.defer();
        $http.post(REST_SERVICE_URI+'nhomkhachhang/delete.php', nhomkhachhang, config)
        .then(
            function (response) {
                deferred.resolve(response.data);
            },
            function(errResponse){
                console.error('Error while updating nhomkhachhang');
                deferred.reject(errResponse);
            }
            );
        return deferred.promise;
    }
}])