<div class="home-filter">
        <span class="home-filter__label">Sắp xếp theo</span>
        <button class="home-filter__btn btn">Phổ biến</button>
        <button class="home-filter__btn btn">Mới nhất</button>
        
        <div class="select-input">
            <span class="select-input__lable">Giá</span>
            <i class=" select-input__icon fa fa-chevron-down" aria-hidden="true"></i>
            <ul class="select-input__list">
                <li class="select-input__item">
                    <a href="giaodientk.php?page_layout=giamdan&mataikhoan=<?php    $mataikhoan = $_GET['mataikhoan'];echo $mataikhoan;?>" class="select-input__link">Giảm dần</a>
                </li>
                <li class="select-input__item">
                    <a href="giaodientk.php?page_layout=tangdan&mataikhoan=<?php    $mataikhoan = $_GET['mataikhoan'];echo $mataikhoan;?>" class="select-input__link">Tăng dần</a>
                </li>
            </ul>
        
        </div>
    
</div>