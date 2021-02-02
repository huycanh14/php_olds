var nhan_vat_game = /** @class */ (function () {
    //để tạo ra instance
    function nhan_vat_game(ten_nhan_vat, slogan, mau) {
        this.ten_nhan_vat = ten_nhan_vat;
        this.slogan = slogan;
        this.mau = mau;
    }
    nhan_vat_game.prototype.hienthiten = function () {
        return "Nh\u00E2n v\u1EADt: " + this.ten_nhan_vat + ", \n\t\tslogan: " + this.slogan + " \n\t\tv\u00E0 ch\u1EC9 s\u1ED1 m\u00E1u l\u00E0: " + this.mau;
    };
    return nhan_vat_game;
}());
var nhanvat1 = new nhan_vat_game('iralia', 'Ý chí của lưỡi kém', 697.2);
console.log(nhanvat1.hienthiten());
var dienthoai = /** @class */ (function () {
    function dienthoai(ten, gia, sao, mausac) {
        this.ten = ten;
        this.gia = gia;
        this.sao = sao;
        this.mausac = mausac;
    }
    dienthoai.prototype.showNoiDung = function () {
        return "San pham: " + this.ten + ", gia: " + this.gia + ", sao: " + this.sao + ", mau sac co " + this.mausac.length + " mau";
    };
    return dienthoai;
}());
var sp1 = new dienthoai("Samsung s8", 19000, 4, ['xanh', 'vang', 'ghi']);
console.log(sp1.showNoiDung());
