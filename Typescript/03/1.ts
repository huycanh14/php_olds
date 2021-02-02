let matkhau:string = '1234567890';
class Nguoi{
	private _ten:string;
	public get ten() : string {
		if(matkhau == '1234567890'){
			return this._ten;
		}
		else
		{
			return 'Sai mật khẩu rồi';
		}
	}

	public set ten(v : string) {
		if(matkhau == '1234567890'){
			this._ten = v;
		}
		else{
			this._ten = 'Sai mật khẩu';
		}
	}
}

let nguoiso1 = new Nguoi();
nguoiso1.ten = "Đặng Huy Cảnh";
console.log(nguoiso1.ten);