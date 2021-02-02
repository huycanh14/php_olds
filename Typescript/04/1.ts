//giống bản vẽ nháp, mô tả tính năng của class
abstract class DienThoai{
	ten: string;

	abstract  guitinnhan(): void

	abstract goidienthoai(): string;
}

//chính xác hóa nó bằng tạo class sủ dụng lại bản thiết kế abstract
class android extends DienThoai {
	guitinnhan(){
		console.log('Gửi tin nhắn trong Android');
	}

	goidienthoai(){
		return 'Gọi điện thoại';
	}
}
let samsung = new android();
samsung.guitinnhan();
console.log(samsung.goidienthoai());