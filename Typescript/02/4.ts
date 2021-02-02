class hero{
	private _ten: string;
	constructor(_ten: string) {
		this._ten = _ten;
	}

	public get ten() : string {
		return this._ten;
	}

	public set ten(v : string) {
		this._ten = v;
	}
}

let zeus = new hero('Zeus');
console.log('Tên tướng là: ' + zeus.ten);

zeus.ten = "Thần Zeus";
console.log('Tên tướng là: ' + zeus.ten);