//gennernic trong function thông thường
function xem(x) {
    return x;
}
console.log(xem("Đây là hàm gennernic"));
//gennernic trong class
var MayTinh = /** @class */ (function () {
    function MayTinh() {
    }
    MayTinh.xemThongTin = function (x) {
        console.log(x);
    };
    return MayTinh;
}());
// MayTinh.xemThongTin<string>(["Dell", "Hp", "Macbook"]);
// MayTinh.xemThongTin<any>(["Dell", 500, "Macbook"]);
var opDienThoai = /** @class */ (function () {
    function opDienThoai(id, ten, gia) {
        this.id = id;
        this.ten = ten;
        this.gia = gia;
    }
    opDienThoai.prototype.xem = function () {
        console.log("\n\t\t\tid: " + this.id + "\n\t\t\tten: " + this.ten + "\n\t\t\tgia: " + this.gia + "\n\t\t\t");
    };
    return opDienThoai;
}());
function xemtt(motnguoi) {
    console.log("Xin ch\u00E0o, " + motnguoi.ten + " n\u0103m nay " + motnguoi.tuoi + " ph\u1EA3i kh\u00F4nng ");
}
var tuong = /** @class */ (function () {
    function tuong() {
    }
    tuong.prototype.xemtuong = function () {
        console.log('xem');
    };
    tuong.prototype.donkinang = function (mau) {
        return "đổi kỹ năng";
    };
    tuong.prototype.bienve = function () {
        console.log('biến về');
    };
    return tuong;
}());
//name space  và export
var Android;
(function (Android) {
    var String = /** @class */ (function () {
        function String() {
        }
        return String;
    }());
    Android.String = String;
    var Number = /** @class */ (function () {
        function Number() {
        }
        return Number;
    }());
    Android.Number = Number;
})(Android || (Android = {}));
var coca = new Android.String();
var pepsi = new Android.Number();
