var state;
(function (state) {
    state[state["Create"] = 10] = "Create";
    state[state["Processing"] = 11] = "Processing";
    state[state["Finish"] = 12] = "Finish";
})(state || (state = {}));
var congViec = /** @class */ (function () {
    function congViec(id, name, trangthai) {
        this.id = id;
        this.name = name;
        this.trangthai = trangthai;
    }
    congViec.prototype.thongtin = function () {
        return this.id + " - ten: " + this.name + " - trang thai: " + this.trangthai + " ";
    };
    return congViec;
}());
var cv1 = new congViec(1, 'Hoc html', state.Finish);
console.log(cv1.thongtin());
