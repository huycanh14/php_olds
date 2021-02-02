class nhan_vat_game{
	ten_nhan_vat: string;
	slogan: string;
	mau: number;
	//để tạo ra instance
	constructor(ten_nhan_vat:string, slogan:string, mau:number){
		this.ten_nhan_vat = ten_nhan_vat;
		this.slogan = slogan;
		this.mau = mau;
	}

	hienthiten(){
		return `Nhân vật: ${this.ten_nhan_vat}, 
		slogan: ${this.slogan} 
		và chỉ số máu là: ${this.mau}`;
	}
}
let nhanvat1 = new nhan_vat_game('iralia', 'Ý chí của lưỡi kém', 697.2);
console.log(nhanvat1.hienthiten());

class dienthoai{
	ten: string;
	gia: number;
	sao: number;
	mausac: string[];
	constructor(ten: string, gia: number, sao: number, mausac: string[]){
		this.ten = ten;
		this.gia = gia;
		this.sao = sao;
		this.mausac = mausac;
	}
	showNoiDung(){
		return `San pham: ${this.ten}, gia: ${this.gia}, sao: ${this.sao}, mau sac co ${this.mausac.length} mau`;
	}
}
let sp1 = new dienthoai("Samsung s8", 19000, 4, ['xanh', 'vang', 'ghi']);
console.log(sp1.showNoiDung());
