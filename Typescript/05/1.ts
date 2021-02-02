//gennernic trong function thông thường
function xem<T>(x:T): T{
	return x;
}
console.log(xem<string>("Đây là hàm gennernic"));

//gennernic trong class
class MayTinh{
	static xemThongTin<T>(x: T[]) : void{
		console.log(x);
	}
}
// MayTinh.xemThongTin<string>(["Dell", "Hp", "Macbook"]);
// MayTinh.xemThongTin<any>(["Dell", 500, "Macbook"]);

class opDienThoai<X, Y, Z>{
	id: X;
	ten: Y;
	gia: Z;
	constructor(id: X, ten: Y, gia: Z){
		this.id = id;
		this.ten = ten;
		this.gia = gia;
	}

	xem(): void{
		console.log(
			`
			id: ${this.id}
			ten: ${this.ten}
			gia: ${this.gia}
			`);
	}
}

/*let op1 = new opDienThoai(1, "Ốp con thỏ cho ip 7", 30000);
op1.xem();

let op2 = new opDienThoai(1, "Ốp xiami", "10 usd");
op2.xem();*/


//interface cơ bản
interface nguoi{
	tuoi?:number; //có thể có tuoi hoặc khônng
	ten:string;
}
function xemtt(motnguoi:nguoi):void{
	console.log(
		`Xin chào, ${motnguoi.ten} năm nay ${motnguoi.tuoi} phải khônng `);
}
//xemtt({tuoi:21, ten:'Cảnh'});


//interface class  -->  khi có 1 class tạo từ interface này thì class đó phải có tối thiểu các thuộc tính này
interface tuongInterface{
	ten: string;
	mau: number;
	satthuong: number;
	mota: string;

	xemtuong():void;
	donkinang(mau:number): any;
	bienve(): void;
}

class tuong implements tuongInterface{
	ten: string;
	mau: number;
	satthuong: number;
	mota: string;
	mana: number;
	xemtuong():void{
		console.log('xem');
	}
	donkinang(mau:number): any{
		return "đổi kỹ năng";
	}
	bienve(): void{
		console.log('biến về');
	}
}

//name space  và export
module Android{
	export class String{

	}
	export class Number{

	}
}

let coca = new Android.String();
let pepsi = new Android.Number();