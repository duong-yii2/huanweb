<?php

namespace backend\helpers;

use common\models\ArticlePageRecruitments;
use common\models\Category;
use common\models\About;
use backend\modules\rbac\models\RbacAuthItem;
use backend\modules\rbac\models\RbacAuthRule;

class AcpHelper
{
    public static function getCategoryGroup(){
        return [
            1 => 'Danh mục vật tư',
            2 => 'Danh mục tin tức',
            3 => 'Danh mục dự án',
            4 => 'Danh mục Gallery',
            5 => 'Danh mục dịch vụ',
            6 => 'Danh mục phong cách',
            7 => 'Danh mục chức vụ',
            8 => 'Danh mục vị trí tuyển dụng',
            9 => 'Danh mục nhóm câu hỏi thường gặp',
            10 => 'Danh mục Phong thủy',
            11 => 'Danh mục Thông tin',
            12 => 'Danh mục Trợ giúp',
            13 => 'Danh mục báo giá',
            14 => 'Danh mục trái',
            \common\models\Category::GROUP_BLOG => 'Danh mục Blog',
            \common\models\Category::TYPE_RECRUITMENT => 'Danh mục Vị trí tuyển dụng',
            \common\models\Category::GROUP_FOOTER => 'Danh mục chân trang',
            \common\models\Category::USER_STYLE => 'Phong cách Người dùng',
            \common\models\Category::USER_SPECIALIZE => 'Lĩnh vực kinh doanh',
            \common\models\Category::USER_TYPE_OF_ORGANIZATION => 'Loại hình tổ chức',
            \common\models\Category::TYPE_PROJECT => 'Loại Art Gallery',
            \common\models\Category::TYPE_HANDOVER => 'Loại bàn giao',
            \common\models\Category::COLOR => 'Màu sắc',
            Category::TYPE_HOUSE => 'Loại Nhà',
            Category::TYPE_ROOM => 'Không gian',
            Category::TYPE_IMAGE => 'Loại Ảnh',
            Category::TYPE_CURRENCY => 'Đơn vị tiền tệ'

        ];
    }

    public static function getCategoryNewGroup(){
        return [
            1 => 'Danh mục vật tư',
            2 => 'Danh mục tin tức',
            3 => 'Danh mục dự án',
            4 => 'Danh mục Gallery',
            5 => 'Danh mục dịch vụ',
            6 => 'Danh mục phong cách',
            7 => 'Danh mục chức vụ',
            8 => 'Danh mục vị trí tuyển dụng',
            9 => 'Danh mục nhóm câu hỏi thường gặp',
            10 => 'Danh mục Phong thủy',
            11 => 'Danh mục Thông tin',
            12 => 'Danh mục Trợ giúp',
            13 => 'Danh mục báo giá',
            14 => 'Danh mục trái',
            \common\models\Category::GROUP_FOOTER => 'Danh mục chân trang',
            \common\models\Category::USER_STYLE => 'Phong cách Người dùng',
            \common\models\Category::USER_SPECIALIZE => 'Lĩnh vực kinh doanh',
            \common\models\Category::USER_TYPE_OF_ORGANIZATION => 'Loại hình tổ chức',
            \common\models\Category::TYPE_PROJECT => 'Loại Art Gallery',
            \common\models\Category::TYPE_HANDOVER => 'Tình trạng nhà',
            \common\models\Category::COLOR => 'Màu sắc',
            Category::TYPE_HOUSE => 'Loại Nhà',
            Category::TYPE_ROOM => 'Không gian',
            Category::TYPE_IMAGE => 'Loại Ảnh',
            Category::TYPE_CURRENCY => 'Đơn vị tiền tệ',
            Category::GROUP_MEDAL_EXPERT => 'Loại Huy hiệu Chuyên gia',
            Category::TYPE_TOOL => 'Danh Mục Dụng Cụ',
            Category::TYPE_MACHINES => 'Danh Mục Máy Móc',
            Category::TYPE_DEVICE => 'Danh Mục Thiết Bị',
            Category::TYPE_TECHNOLOGY => 'Danh Mục Công Nghệ',
            Category::TYPE_SOFTWARE => 'Danh Mục Phần Mềm',
        ];
    }

    public static function getCategoryLayout(){
        return [
            \common\models\Category::LAYOUT_DEFAULT => 'Layout Mặc định',
            \common\models\Category::LAYOUT_PARTNER => 'Layout Cộng sự',
            \common\models\Category::FOOTER_PERMANENT => 'Chân trang có bài viết Cố định',
            \common\models\Category::FOOTER_DEFAULT => 'Chân trang mặc định',

        ];
    }

    public static  function getFooterLayout(){
        return [
            \common\models\Category::FOOTER_PERMANENT => 'Chân trang có bài viết Cố định',
            \common\models\Category::FOOTER_DEFAULT => 'Chân trang mặc định',
        ];
    }

    public static function getRecruitmentLayout(){
        return [
            \common\models\Category::LAYOUT_DEFAULT => 'Layout Mặc định',
            \common\models\Category::LAYOUT_PARTNER => 'Layout Cộng sự',
        ];
    }

    public static function getGender(){
        return [
            '0' => 'Nam',
            '1' => 'Nữ'
        ];
    }

    public static function getPosition(){
        return [
            About::POSITION_NULL => 'Không',
            About::POSITION_TOP => 'Hiển thị phía trên',
            About::POSITION_BOTTOM => 'Hiển thị phía dưới',
        ];
    }

    public static function getCategoryGroupLabel($cat){
        $categoryGroup = self::getCategoryGroup();
        if(isset($categoryGroup[$cat]))
            return $categoryGroup[$cat];
    }

    public static function getCategoryNhomvaitroLabel($cat){
        $categoryGroup = \common\models\Category::getAllCategoryRecruitmentChild( \common\models\Category::TYPE_RECRUITMENT_GROUP,false);
        if(isset($categoryGroup[$cat]))
            return $categoryGroup[$cat];
    }

    public static function getAboutType(){
        return [
            About::TYPE_NORMAL => 'Bài thường',
            About::TYPE_CHILD => 'Bài viết con',
            About::TYPE_GREETING => 'Lời chào',
            About::TYPE_BANNER => 'Banner',
            About::TYPE_IMAGE => 'Hình ảnh',
            About::TYPE_3_COL => 'Dạng 3 cột',
            About::TYPE_1_COL => 'Ảnh và text 1 hàng',
            About::TYPE_HAVE_BTN => 'Có Button',
            About::TYPE_HAVE_COL3_HOZ => 'Có bài viết dạng 3 cột là con ngang',
            About::TYPE_HAVE_COL3_VER => 'Có bài viết dạng 3 cột là con dọc',
            About::TYPE_BLOG => 'Dạng Blog Trang chủ',
            About::TYPE_SERVICE => 'Dạng Dịch vụ Trang chủ',
            About::TYPE_PARTNER => 'Dạng Đối tác Trang chủ',
            About::TYPE_THE_INTERESTING_THINGS => 'Dạng Những điều thú vị Trang chủ',
            About::ABOUT_SITE_HOME => 'Dạng Giới thiệu Trang chủ',
            About::TYPE_TIMELINE => 'Dạng Timeline trang Story',
            About::TYPE_ENDTIMELINE => 'Dạng Bài viết cuối Timeline trang Story',
            About::TYPE_UNDER_TIMELINE => 'Dạng bài viết dưới Timeline trang Story',
            About::TYPE_ARTICLE_END_TIMELINE => 'Dạng Bài viết con của Bài viết cuối Timeline trang Story',
            About::TYPE_COL_CHILD => 'Dạng có bài viết con và ảnh phía bên trái Story',
            About::TYPE_ARTICLE_COL_CHILD => 'Dạng bài viết con của Dạng có bài viết con và ảnh phía bên trái Story',
            About::TYPE_CHILD_OF_ONE_ARTICE_HAVE_POSITION => 'Dạng bài viết có vị trí hiển thị (Trên/dưới/trái/phải)',
            About::TYPE_REVIEW => 'Dạng bài viết Đánh giá',
            About::TYPE_CHILD_REVIEW => 'Dạng bài viết con của Đánh giá',
            About::TYPE_COMPARE => 'Dạng bài viết so sánh',
            About::TYPE_CHILD_COMPARE_LEFT => 'Dạng bài viết con của So sánh bên trái',
            About::TYPE_CHILD_COMPARE_RIGHT => 'Dạng bài viết con của So sánh bên phải',
            About::TYPE_TOP_CHILD_COMPARE_LEFT => 'Dạng bài viết tiêu đề của So sánh bên trái',
            About::TYPE_TOP_CHILD_COMPARE_RIGHT => 'Dạng bài viết tiêu đề của So sánh bên phải',
            About::TYPE_QUOTE => 'Dạng báo giá',
            About::TYPE_HAVE_COL3_HOZ_TEXT_BLACK => 'Có bài viết dạng 3 cột là con ngang chữ đen',
            About::TYPE_DESC_FORM => 'Giới thiệu Form',
            About::TYPE_2_COL => 'Dạng 2 cột',
            About::TYPE_2_COL_TITLE => 'Tiêu đề của dạng 2 cột',
            About::TYPE_RULE_CHECK_SALE => 'Chính sách cam kết bán hàng chính hãng',
            About::TYPE_RULE_CHECK_USER_PRODUCT => 'Chính sách cam kết sử dụng chính hãng',
            About::TYPE_RULE_CHECK_WORK_SAFE => 'Chính sách cam kết an toàn lao động',
            About::TYPE_RULE_CHECK_SPECIAL_OFFERS => 'Chính sách chương trình ưu đãi',
        ];
    }

    public static function getAboutPage(){
        return [
            About::PAGE_TYPE_STORY => 'Story',
            About::PAGE_TYPE_CORE_VALUE => 'Giá trị cốt lõi',
            About::PAGE_TYPE_WHY_CHOOSE => 'Tại sao chọn AgoHome',
            About::PAGE_TYPE_INDEX => 'Trang chủ',
            About::PAGE_FAQ => 'Trang FAQ',
            About::PAGE_ARTGALLERY => 'Trang Art Gallery',
            About::PAGE_TYPE_COLLABORATE => 'Trang Hợp tác',
            About::PAGE_TYPE_LASTING => 'Sự Bền Vững',
            About::PAGE_TYPE_RATING => 'Trang Đánh Giá',
            About::PAGE_TYPE_RATING_VIEW => 'Trang Chi Tiết Đánh Giá',
            About::PAGE_TYPE_RATING_LAST => 'Trang đánh giá tiếp theo',
        ];
    }

    public static function getPageShowRecruitment(){
        return [
            ArticlePageRecruitments::PAGE_INDEX => 'Trang chủ Tuyển dụng',
            ArticlePageRecruitments::PAGE_OTHER => 'Các vị trí tìm cộng sự khác'
        ];
    }

    public static function getStatusOption(){
        return [
            1 => 'Hiển thị',
            0 => 'Không hiển thị',
        ];
    }

    public static function getViewOption(){
        return [
            ArticlePageRecruitments::VIEW_BANNER => 'Banner',
            ArticlePageRecruitments::VIEW_TEXT_ONE_COLUMN => 'Dạng text 1 cột',
            ArticlePageRecruitments::VIEW_TEXT_MULTICOLUMN => 'Dạng text nhiều cột',
            ArticlePageRecruitments::VIEW_BOX_MULTICOLUMN => 'Dạng box nhiều cột',
            ArticlePageRecruitments::VIEW_JOB => 'Dạng kiểu tuyển dụng',
            ArticlePageRecruitments::VIEW_INTRODUCE => 'Bài giới thiệu trang chi tiết'
        ];
    }

    public static function getTypeRecruitments() {
        return [
            0 => 'Toàn thời gian',
            1 => 'Thực tập',
            2 => 'Tự do',
        ];
    }

    public static function getAuthItem(){
        $AuthItem = RbacAuthItem::find()->all();
        return $AuthItem;
    }

    public static function getAuthRule(){
        $AuthRule = RbacAuthRule::find()->all();
        return $AuthRule;
    }

    public static function getArrayImageType(){
        return [
            0 => 'Loại 360',
            1 => 'Loại Before/After',
            2 => 'Ảnh không gian',
            3 => 'Video',
            4 => 'Ảnh 3D',
            5 => 'Ảnh bản vẽ',
            6 => 'Ảnh StyleBoard'
        ];
    }

    public static function getCurrency(){
        return [
            9 => 'tỷ',
            6 => 'triệu',
            3 => 'nghìn',
            0 => 'đồng'
        ];
    }

    public static function getCurrencyLabel($cur){
        $currency = self::getCurrency();
        if(isset($currency[$cur]))
            return $currency[$cur];
    }

    public static function shortDesc($str, $len, $more = '...', $charset = 'UTF-8') {
        $str = strip_tags($str);
        $str = str_replace(array("\r\n", "\r", "\n", '"', "'", "&nbsp;", "&amp;"), array("", "", "", '', "", " ", "&"), $str);
        if (mb_strlen($str, $charset) > $len) {
            $arr = explode(' ', $str);
            $str = mb_substr($str, 0, $len, $charset);
            $arrRes = explode(' ', $str);
            $last = $arr[count($arrRes) - 1];
            unset($arr);
            if (strcasecmp($arrRes[count($arrRes) - 1], $last))
                unset($arrRes[count($arrRes) - 1]);
            return implode(' ', $arrRes) . "...";
        }
        return $str;
    }
    public static function fixDisplay($value=''){
        if (!empty($value)){
            $value = str_replace(array('\n\r','\n\r'), '<br>', $value);
            $value = str_replace(array(PHP_EOL,'\n','\r'), '<br>', $value);
        }
        return $value;
    }

    public static function getDayofWeek(){
        return [
            '1' => 'Chủ Nhật',
            '2' => 'Thứ Hai',
            '3' => 'Thứ Ba',
            '4' => 'Thứ Tư',
            '5' => 'Thứ Năm',
            '6' => 'Thứ Sáu',
            '7' => 'Thứ Bảy',
        ];
    }
}
