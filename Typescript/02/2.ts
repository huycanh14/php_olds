enum state{
	Create = 10,
	Processing,
	Finish
}
class congViec {
	id: number;
	name: string;
	trangthai: state;

	constructor(id: number, name: string, trangthai: state) {
		this.id = id;
		this.name = name;
		this.trangthai = trangthai;
	}

	thongtin(){
		return `${this.id} - ten: ${this.name} - trang thai: ${this.trangthai} `;
	}
}

let cv1 = new congViec(1, 'Hoc html', state.Finish);
console.log(cv1.thongtin());