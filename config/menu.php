<?php 

return [
    [
        'label'=>'Đăng xuất',
        'route'=>'admin.logout',
        'icon'=>'fa-home'
    ],
    [
        'label'=>'Home',
        'icon'=>'fa-house-user',
        'route'=>'admin.index',

    ],
    [
        'label'=>'Danh mục con',
        'icon'=>'fa-book',
        'route'=>'admin.index',
        'item'=>[
            [
                'label'=>'Nhãn hiệu',
                'icon'=>'fa-house-user',
                'route'=>'nhanhieu.index',

            ],
            [
                'label'=>'Xuất xứ',
                'icon'=>'fa-house-user',
                'route'=>'xuatxu.index',

            ],
            
            [
                'label'=>'Nhân viên',
                'route'=>'nhanvien.index',
                'icon'=>'fa-certificate'
            ],

            [
                'label'=>'Chức vụ',
                'route'=>'chucvu.index',
                'icon'=>'fa-certificate'
            ]

        ]
        
        

    ],

    [
        'label'=>'Khách hàng',
        'route'=>'khachhang.index',
        'icon'=>'fa-house-user'
    ]

   
    

];









?>