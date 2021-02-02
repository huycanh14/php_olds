var matkhau = '1234567890';
var Nguoi = /** @class */ (function () {
    function Nguoi() {
    }
    Object.defineProperty(Nguoi.prototype, "ten", {
        get: function () {
            if (matkhau == '1234567890') {
                return this._ten;
            }
            else {
                return 'Sai mật khẩu rồi';
            }
        },
        set: function (v) {
            if (matkhau == '1234567890') {
                this._ten = v;
            }
            else {
                this._ten = 'Sai mật khẩu';
            }
        },
        enumerable: true,
        configurable: true
    });
    return Nguoi;
}());
var nguoiso1 = new Nguoi();
nguoiso1.ten = "Đặng Huy Cảnh";
console.log(nguoiso1.ten);
