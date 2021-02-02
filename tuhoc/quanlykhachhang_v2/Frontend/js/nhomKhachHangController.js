app.controller('nhomKhachHangController', ['$scope','$http', '$mdToast', 'nhomKhachHangService', function($scope,$http, $mdToast, nhomKhachHangService){
	var self = this;
	self.nhomkhachhang = { ID: null, TenNhom:'' };
	self.nhomkhachhangs = [];

	self.submit = submit;
	self.update = update;
	self.remove = remove;

	$scope.showNhomKhachHang = function(nhomkhachhang){
        nhomkhachhang.hienra = !nhomkhachhang.hienra;
    }

    findAllNhomKhachHang();
 
    function findAllNhomKhachHang(){
    	nhomKhachHangService.findAllNhomKhachHang()
            .then(
            function(d) {
                self.nhomkhachhangs = d;
                console.log(d);
            },
            function(errResponse){
                console.error('Error while fetching nhomkhachhangs');
            }
        );
    }

     function createNhomKhachHang(nhomkhachhang){
     	nhomKhachHangService.createNhomKhachHang(nhomkhachhang)
        .then(function(res){ //thành công
        	if(res == true){
        		findAllNhomKhachHang();
        		self.TenNhom = "";
        		$noidung = 'Thêm thành công';
        		$scope.showSimpleToast($noidung);
        	}
        }, function(errResponse){
        	console.error('Error while updating nhomkhachhang');
        	$noidung = 'Thêm thất bại';
        	$scope.showSimpleToast($noidung);
        }
        );
    }

    function updateNhomKhachHang(nhomkhachhang){
    	nhomKhachHangService.updateNhomKhachHang(nhomkhachhang)
    	.then(function(res){ //thành công
    		if(res == true){
    			findAllNhomKhachHang();
    			$noidung = 'Cập nhật thành công';
    			$scope.showSimpleToast($noidung);
    		}
    	}, function(errResponse){
    		console.error('Error while updating nhomkhachhang');
    		$noidung = 'Cập nhật thất bại';
    		$scope.showSimpleToast($noidung);
    	}
    	);
    }

    function deleteNhomKhachHang(nhomkhachhang){
    	nhomKhachHangService.deleteNhomKhachHang(nhomkhachhang)
    	.then(function(res){ //thành công
    		if(res == true){
    			findAllNhomKhachHang();
    			$noidung = 'Xóa thành công';
    			$scope.showSimpleToast($noidung);
    		}
    	}, function(errResponse){
    		console.error('Error while updating nhomkhachhang');
    		$noidung = 'Xóa thất bại';
    		$scope.showSimpleToast($noidung);
    	}
    	);
    }

    function submit(){
    	var data = $.param({
			TenNhom:self.TenNhom
		});
    	createNhomKhachHang(data);
    }

    function update(nhomkhachhang){
    	var data = $.param({
			ID: nhomkhachhang.ID,
			TenNhom:nhomkhachhang.TenNhom
		});
        updateNhomKhachHang(nhomkhachhang);
    	nhomkhachhang.hienra = !nhomkhachhang.hienra;
    }

    function remove(nhomkhachhang){
    	if (!confirm('Bạn chắc chắn muốn xóa ?')) {
    		return false;
    	}else{
    		var data = $.param({
    			ID: nhomkhachhang.ID
    		});
    		deleteNhomKhachHang(data);
    	}
    }

    //Hiển thị thông báo
	var last = {
		bottom: false,
		top: false,
		left: false,
		right: true
	};

	$scope.toastPosition = angular.extend({}, last);

	$scope.getToastPosition = function() {
		sanitizePosition();

		return Object.keys($scope.toastPosition)
		.filter(function(pos) {
			return $scope.toastPosition[pos];
		}).join(' ');
	};

	function sanitizePosition() {
		var current = $scope.toastPosition;

		if (current.bottom && last.top) {
			current.top = false;
		}
		if (current.top && last.bottom) {
			current.bottom = false;
		}
		if (current.right && last.left) {
			current.left = false;
		}
		if (current.left && last.right) {
			current.right = false;
		}

		last = angular.extend({}, current);
	}

	$scope.showSimpleToast = function($noidung) {
		var pinTo = $scope.getToastPosition();

		$mdToast.show(
			$mdToast.simple()
			.textContent($noidung)
			.position(pinTo)
			.hideDelay(3000)
		);
	};
}]);