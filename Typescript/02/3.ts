class khoahoc {
	public id: number;
	public ten: string;
	public dodai: number;
	constructor(id: number, ten: string, dodai: number) {
		this.id = id;
		this.ten = ten;
		this.dodai = dodai;
	}
	//Method
	xemkhoahoc(){
		console.log(this.ten);
		console.log(
			`
			ID khóa học là: ${this.id},
			Tên khóa học là: ${this.ten},
			Độ dài: ${this.dodai} tiếng
			`);
	}
}

class khoahoclaptrinh extends khoahoc {
	public filedinhkem: string;
	constructor(id: number, ten: string, dodai: number, filedinhkem: string) {
		super(id, ten, dodai);
		this.filedinhkem = filedinhkem;
	}
	//Method
	xemkhoahoc(){
		super.xemkhoahoc();
		console.log('File đính kèm: ' + this.filedinhkem);
	}
	test1(){
		console.log(this.ten);
	}
}

//test public
let khoa08 = new khoahoc(8, 'Học làm banner', 6);
console.log(khoa08.ten); //bên ngoài class
khoa08.xemkhoahoc();

let khoa09 = new khoahoclaptrinh(09, 'Học sử dụng bootstrap', 13, 'a.zip');
console.log(khoa09.ten);
khoa09.test1();