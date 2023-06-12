<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678')
            ],
            [
                'name' => 'user',
                'email' => 'user@gmail.com',
                'password' => Hash::make('12345678')
            ]
        ]);
        // DB::table('products')->insert([
        //     [
        //         'id' => 1,
        //         'brand_id' => 1,
        //         'product_category_id' => 1,
        //         'name' => 'AIR FORCE 1',
        //         'description' => 'Nike Air Force 1 Ra mắt vào năm 1982 bởi nhà thiết kế Bruce Kilgore, ngay lập tức mẫu giày Nike Air Force 1 (AF1) đã trở thành một hit mạnh trên khắp thế giới khi sold out ngay trong ngày đầu trình làng.',
        //         'content' => 'Nike Air Force 1 có hơn 1.700 bản phối với nhiều màu khác nhau và ngày càng tăng lên. Nhưng 2 màu cơ bản White
        //         on White và Black on Black vẫn là hai phiên bản thành công nhất với số lượng sản phẩm bán ra chạy nhất trong suốt nhiều thập kỷ qua.
        //         12 triệu là số lượng giày được bán ra trong thời kì đỉnh cao của Nike Air Force 1 vào năm 2005. Con số đã phần nào thể hiện được sự phổ biến của nó trên toàn thế giới.
        //         Nike Air Force 1 thu về hơn 800 triệu USD mỗi năm cho Nike, sự tồn tại của đôi giày này trong hơn 25 năm qua cho ta thấy vị trí của nó trong trái tim những người đam mê footwear cao đến mức nào.',
        //         'price' => 3300000,
        //         'qty' => 300,
        //         'discount' => 0,
        //         'rating' => 5
        //     ],
        //     [
        //         'id' => 2,      
        //         'brand_id' => 2,
        //         'product_category_id' => 1,        
        //         'name' => 'JORDAN 1 LOW',
        //         'description' => 'Jordan 1 Low Ra mắt vào năm 1982 bởi nhà thiết kế Bruce Kilgore, ngay lập tức mẫu giày Jordan 1 Low (AF1) đã trở thành một hit mạnh trên khắp thế giới khi sold out ngay trong ngày đầu trình làng.',
        //         'content' => 'Jordan 1 Low có hơn 1.700 bản phối với nhiều màu khác nhau và ngày càng tăng lên. Nhưng 2 màu cơ bản White
        //         on White và Black on Black vẫn là hai phiên bản thành công nhất với số lượng sản phẩm bán ra chạy nhất trong suốt nhiều thập kỷ qua.
        //         12 triệu là số lượng giày được bán ra trong thời kì đỉnh cao của Jordan 1 Low vào năm 2005. Con số đã phần nào thể hiện được sự phổ biến của nó trên toàn thế giới.
        //         Jordan 1 Low thu về hơn 800 triệu USD mỗi năm cho Nike, sự tồn tại của đôi giày này trong hơn 25 năm qua cho ta thấy vị trí của nó trong trái tim những người đam mê footwear cao đến mức nào.',
        //         'price' => 4800000,
        //         'qty' => 200,
        //         'discount' => 0,
        //         'rating' => 5
        //     ],
        //     [
        //         'id' => 3,      
        //         'brand_id' => 1,
        //         'product_category_id' => 1,        
        //         'name' => 'NIKE COURT VISION LOW',
        //         'description' => 'NIKE COURT VISION LOW Ra mắt vào năm 1982 bởi nhà thiết kế Bruce Kilgore, ngay lập tức mẫu giày NIKE COURT VISION LOW (AF1) đã trở thành một hit mạnh trên khắp thế giới khi sold out ngay trong ngày đầu trình làng.',
        //         'content' => 'NIKE COURT VISION LOW có hơn 1.700 bản phối với nhiều màu khác nhau và ngày càng tăng lên. Nhưng 2 màu cơ bản White
        //         on White và Black on Black vẫn là hai phiên bản thành công nhất với số lượng sản phẩm bán ra chạy nhất trong suốt nhiều thập kỷ qua.
        //         12 triệu là số lượng giày được bán ra trong thời kì đỉnh cao của NIKE COURT VISION LOW vào năm 2005. Con số đã phần nào thể hiện được sự phổ biến của nó trên toàn thế giới.
        //         NIKE COURT VISION LOW thu về hơn 800 triệu USD mỗi năm cho Nike, sự tồn tại của đôi giày này trong hơn 25 năm qua cho ta thấy vị trí của nó trong trái tim những người đam mê footwear cao đến mức nào.',
        //         'price' => 2200000,
        //         'qty' => 20,
        //         'discount' => 0,
        //         'rating' => 5
        //     ],
        //     [
        //         'id' => 4,      
        //         'brand_id' => 1,
        //         'product_category_id' => 1,        
        //         'name' => 'NIKECOURT AIR ZOOM GP TURBO',
        //         'description' => 'NIKECOURT AIR ZOOM GP TURBO Ra mắt vào năm 1982 bởi nhà thiết kế Bruce Kilgore, ngay lập tức mẫu giày NIKECOURT AIR ZOOM GP TURBO (AF1) đã trở thành một hit mạnh trên khắp thế giới khi sold out ngay trong ngày đầu trình làng.',
        //         'content' => 'NIKECOURT AIR ZOOM GP TURBO có hơn 1.700 bản phối với nhiều màu khác nhau và ngày càng tăng lên. Nhưng 2 màu cơ bản White
        //         on White và Black on Black vẫn là hai phiên bản thành công nhất với số lượng sản phẩm bán ra chạy nhất trong suốt nhiều thập kỷ qua.
        //         12 triệu là số lượng giày được bán ra trong thời kì đỉnh cao của NIKECOURT AIR ZOOM GP TURBO vào năm 2005. Con số đã phần nào thể hiện được sự phổ biến của nó trên toàn thế giới.
        //         NIKECOURT AIR ZOOM GP TURBO thu về hơn 800 triệu USD mỗi năm cho Nike, sự tồn tại của đôi giày này trong hơn 25 năm qua cho ta thấy vị trí của nó trong trái tim những người đam mê footwear cao đến mức nào.',
        //         'price' => 4200000,
        //         'qty' => 200,
        //         'discount' => 0,
        //         'rating' => 5
        //     ],
        //     [
        //         'id' => 5,      
        //         'brand_id' => 1,
        //         'product_category_id' => 1,        
        //         'name' => 'NIKECOURT VAPOR LITE HC',
        //         'description' => 'NIKECOURT VAPOR LITE HC Ra mắt vào năm 1982 bởi nhà thiết kế Bruce Kilgore, ngay lập tức mẫu giày NIKECOURT VAPOR LITE HC (AF1) đã trở thành một hit mạnh trên khắp thế giới khi sold out ngay trong ngày đầu trình làng.',
        //         'content' => 'NIKECOURT VAPOR LITE HC có hơn 1.700 bản phối với nhiều màu khác nhau và ngày càng tăng lên. Nhưng 2 màu cơ bản White
        //         on White và Black on Black vẫn là hai phiên bản thành công nhất với số lượng sản phẩm bán ra chạy nhất trong suốt nhiều thập kỷ qua.
        //         12 triệu là số lượng giày được bán ra trong thời kì đỉnh cao của NIKECOURT VAPOR LITE HC vào năm 2005. Con số đã phần nào thể hiện được sự phổ biến của nó trên toàn thế giới.
        //         NIKECOURT VAPOR LITE HC thu về hơn 800 triệu USD mỗi năm cho Nike, sự tồn tại của đôi giày này trong hơn 25 năm qua cho ta thấy vị trí của nó trong trái tim những người đam mê footwear cao đến mức nào.',
        //         'price' => 2800000,
        //         'qty' => 200,
        //         'discount' => 0,
        //         'rating' => 5
        //     ],
        //     [
        //         'id' => 6,      
        //         'brand_id' => 1,
        //         'product_category_id' => 1,        
        //         'name' => 'NIKE AIR MAX 2017',
        //         'description' => 'NIKE AIR MAX 2017 Ra mắt vào năm 1982 bởi nhà thiết kế Bruce Kilgore, ngay lập tức mẫu giày NIKE AIR MAX 2017 (AF1) đã trở thành một hit mạnh trên khắp thế giới khi sold out ngay trong ngày đầu trình làng.',
        //         'content' => 'NIKE AIR MAX 2017 có hơn 1.700 bản phối với nhiều màu khác nhau và ngày càng tăng lên. Nhưng 2 màu cơ bản White
        //         on White và Black on Black vẫn là hai phiên bản thành công nhất với số lượng sản phẩm bán ra chạy nhất trong suốt nhiều thập kỷ qua.
        //         12 triệu là số lượng giày được bán ra trong thời kì đỉnh cao của NIKE AIR MAX 2017 vào năm 2005. Con số đã phần nào thể hiện được sự phổ biến của nó trên toàn thế giới.
        //         NIKE AIR MAX 2017 thu về hơn 800 triệu USD mỗi năm cho Nike, sự tồn tại của đôi giày này trong hơn 25 năm qua cho ta thấy vị trí của nó trong trái tim những người đam mê footwear cao đến mức nào.',
        //         'price' => 3900000,
        //         'qty' => 200,
        //         'discount' => 0,
        //         'rating' => 5
        //     ],
        //     [
        //         'id' => 7,      
        //         'brand_id' => 1,
        //         'product_category_id' => 1,        
        //         'name' => 'NIKE PEGASUS 40',
        //         'description' => 'NIKE PEGASUS 40 Ra mắt vào năm 1982 bởi nhà thiết kế Bruce Kilgore, ngay lập tức mẫu giày NIKE PEGASUS 40 (AF1) đã trở thành một hit mạnh trên khắp thế giới khi sold out ngay trong ngày đầu trình làng.',
        //         'content' => 'NIKE PEGASUS 40 có hơn 1.700 bản phối với nhiều màu khác nhau và ngày càng tăng lên. Nhưng 2 màu cơ bản White
        //         on White và Black on Black vẫn là hai phiên bản thành công nhất với số lượng sản phẩm bán ra chạy nhất trong suốt nhiều thập kỷ qua.
        //         12 triệu là số lượng giày được bán ra trong thời kì đỉnh cao của NIKE PEGASUS 40 vào năm 2005. Con số đã phần nào thể hiện được sự phổ biến của nó trên toàn thế giới.
        //         NIKE PEGASUS 40 thu về hơn 800 triệu USD mỗi năm cho Nike, sự tồn tại của đôi giày này trong hơn 25 năm qua cho ta thấy vị trí của nó trong trái tim những người đam mê footwear cao đến mức nào.',
        //         'price' => 3600000,
        //         'qty' => 200,
        //         'discount' => 8,
        //         'rating' => 5
        //     ],
        //     [
        //         'id' => 8,      
        //         'brand_id' => 1,
        //         'product_category_id' => 1,        
        //         'name' => 'NIKE SB ALLEYOOP',
        //         'description' => 'NIKE SB ALLEYOOP Ra mắt vào năm 1982 bởi nhà thiết kế Bruce Kilgore, ngay lập tức mẫu giày NIKE SB ALLEYOOP (AF1) đã trở thành một hit mạnh trên khắp thế giới khi sold out ngay trong ngày đầu trình làng.',
        //         'content' => 'NIKE SB ALLEYOOP có hơn 1.700 bản phối với nhiều màu khác nhau và ngày càng tăng lên. Nhưng 2 màu cơ bản White
        //         on White và Black on Black vẫn là hai phiên bản thành công nhất với số lượng sản phẩm bán ra chạy nhất trong suốt nhiều thập kỷ qua.
        //         12 triệu là số lượng giày được bán ra trong thời kì đỉnh cao của NIKE SB ALLEYOOP vào năm 2005. Con số đã phần nào thể hiện được sự phổ biến của nó trên toàn thế giới.
        //         NIKE SB ALLEYOOP thu về hơn 800 triệu USD mỗi năm cho Nike, sự tồn tại của đôi giày này trong hơn 25 năm qua cho ta thấy vị trí của nó trong trái tim những người đam mê footwear cao đến mức nào.',
        //         'price' => 4800000,
        //         'qty' => 200,
        //         'discount' => 0,
        //         'rating' => 5
        //     ],
        //     [
        //         'id' => 9,      
        //         'brand_id' => 2,
        //         'product_category_id' => 1,        
        //         'name' => 'AIR JORDAN 1 ELEVATE LOW',
        //         'description' => 'AIR JORDAN 1 ELEVATE LOW Ra mắt vào năm 1982 bởi nhà thiết kế Bruce Kilgore, ngay lập tức mẫu giày AIR JORDAN 1 ELEVATE LOW (AF1) đã trở thành một hit mạnh trên khắp thế giới khi sold out ngay trong ngày đầu trình làng.',
        //         'content' => 'AIR JORDAN 1 ELEVATE LOW có hơn 1.700 bản phối với nhiều màu khác nhau và ngày càng tăng lên. Nhưng 2 màu cơ bản White
        //         on White và Black on Black vẫn là hai phiên bản thành công nhất với số lượng sản phẩm bán ra chạy nhất trong suốt nhiều thập kỷ qua.
        //         12 triệu là số lượng giày được bán ra trong thời kì đỉnh cao của AIR JORDAN 1 ELEVATE LOW vào năm 2005. Con số đã phần nào thể hiện được sự phổ biến của nó trên toàn thế giới.
        //         AIR JORDAN 1 ELEVATE LOW thu về hơn 800 triệu USD mỗi năm cho Nike, sự tồn tại của đôi giày này trong hơn 25 năm qua cho ta thấy vị trí của nó trong trái tim những người đam mê footwear cao đến mức nào.',
        //         'price' => 5800000,
        //         'qty' => 100,
        //         'discount' => 0,
        //         'rating' => 5
        //     ],
        //     [
        //         'id' => 10,      
        //         'brand_id' => 2,
        //         'product_category_id' => 1,        
        //         'name' => 'AIR JORDAN 1 LOW SE CRAFT',
        //         'description' => 'AIR JORDAN 1 LOW SE CRAFT Ra mắt vào năm 1982 bởi nhà thiết kế Bruce Kilgore, ngay lập tức mẫu giày AIR JORDAN 1 LOW SE CRAFT (AF1) đã trở thành một hit mạnh trên khắp thế giới khi sold out ngay trong ngày đầu trình làng.',
        //         'content' => 'AIR JORDAN 1 LOW SE CRAFT có hơn 1.700 bản phối với nhiều màu khác nhau và ngày càng tăng lên. Nhưng 2 màu cơ bản White
        //         on White và Black on Black vẫn là hai phiên bản thành công nhất với số lượng sản phẩm bán ra chạy nhất trong suốt nhiều thập kỷ qua.
        //         12 triệu là số lượng giày được bán ra trong thời kì đỉnh cao của AIR JORDAN 1 LOW SE CRAFT vào năm 2005. Con số đã phần nào thể hiện được sự phổ biến của nó trên toàn thế giới.
        //         AIR JORDAN 1 LOW SE CRAFT thu về hơn 800 triệu USD mỗi năm cho Nike, sự tồn tại của đôi giày này trong hơn 25 năm qua cho ta thấy vị trí của nó trong trái tim những người đam mê footwear cao đến mức nào.',
        //         'price' => 4600000,
        //         'qty' => 150,
        //         'discount' => 0,
        //         'rating' => 5
        //     ],
        //     [
        //         'id' => 11,      
        //         'brand_id' => 2,
        //         'product_category_id' => 1,        
        //         'name' => 'AIR JORDAN 1 MID SE',
        //         'description' => 'AIR JORDAN 1 MID SE Ra mắt vào năm 1982 bởi nhà thiết kế Bruce Kilgore, ngay lập tức mẫu giày AIR JORDAN 1 MID SE (AF1) đã trở thành một hit mạnh trên khắp thế giới khi sold out ngay trong ngày đầu trình làng.',
        //         'content' => 'AIR JORDAN 1 MID SE có hơn 1.700 bản phối với nhiều màu khác nhau và ngày càng tăng lên. Nhưng 2 màu cơ bản White
        //         on White và Black on Black vẫn là hai phiên bản thành công nhất với số lượng sản phẩm bán ra chạy nhất trong suốt nhiều thập kỷ qua.
        //         12 triệu là số lượng giày được bán ra trong thời kì đỉnh cao của AIR JORDAN 1 MID SE vào năm 2005. Con số đã phần nào thể hiện được sự phổ biến của nó trên toàn thế giới.
        //         AIR JORDAN 1 MID SE thu về hơn 800 triệu USD mỗi năm cho Nike, sự tồn tại của đôi giày này trong hơn 25 năm qua cho ta thấy vị trí của nó trong trái tim những người đam mê footwear cao đến mức nào.',
        //         'price' => 4800000,
        //         'qty' => 200,
        //         'discount' => 0,
        //         'rating' => 5
        //     ],
        //     [
        //         'id' => 12,      
        //         'brand_id' => 2,
        //         'product_category_id' => 1,        
        //         'name' => 'AIR JORDAN 4 RETRO SE',
        //         'description' => 'AIR JORDAN 4 RETRO SE Ra mắt vào năm 1982 bởi nhà thiết kế Bruce Kilgore, ngay lập tức mẫu giày AIR JORDAN 4 RETRO SE (AF1) đã trở thành một hit mạnh trên khắp thế giới khi sold out ngay trong ngày đầu trình làng.',
        //         'content' => 'AIR JORDAN 4 RETRO SE có hơn 1.700 bản phối với nhiều màu khác nhau và ngày càng tăng lên. Nhưng 2 màu cơ bản White
        //         on White và Black on Black vẫn là hai phiên bản thành công nhất với số lượng sản phẩm bán ra chạy nhất trong suốt nhiều thập kỷ qua.
        //         12 triệu là số lượng giày được bán ra trong thời kì đỉnh cao của AIR JORDAN 4 RETRO SE vào năm 2005. Con số đã phần nào thể hiện được sự phổ biến của nó trên toàn thế giới.
        //         AIR JORDAN 4 RETRO SE thu về hơn 800 triệu USD mỗi năm cho Nike, sự tồn tại của đôi giày này trong hơn 25 năm qua cho ta thấy vị trí của nó trong trái tim những người đam mê footwear cao đến mức nào.',
        //         'price' => 4800000,
        //         'qty' => 200,
        //         'discount' => 0,
        //         'rating' => 5
        //     ]

        // ]);

        DB::table('brands')->insert([
            [
                'name' => 'NIKE',
            ],
            [
                'name' => 'JORDAN',
            ],
            [
                'name' => 'ADIDAS',
            ]
        ]);

        DB::table('product_categories')->insert([
            [
                'name' => 'Nam',
            ],
            [
                'name' => 'Nữ',
            ]
           
        ]);
        $this->call([RolePermissionSeeder::class]);
    }
}
