Select k.makhoa, k.ten_khoa from khoa as k
Join sinhvien as s
On s.makhoa = k.makhoa
where gioitinh = 1
Group by k.makhoa
Having count(*) = (	Select count(*) from khoa as k
					Join sinhvien as s
					On s.makhoa = k.makhoa
					where gioitinh = 1
					Group by k.makhoa
                    limit 1
);