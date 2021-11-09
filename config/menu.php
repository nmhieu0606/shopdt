<?php 

return [
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
        ]

    ],
    

];









?>