<?php
/* 임시 관리자 메뉴 */
$AD_MENU = Array();
$AD_MENU["Dashboard"] = Array(
  "NAME" => "대시보드",
  "ADDR" => DS . SYSTEM_NAME . DS
);
// 사이트 기본 설정 메뉴
$AD_MENU["Site"] = Array(
  "NAME" => "사이트 기본정보",
  "SUB" => Array(
    0 => Array(
      "NAME" => "기본 정보",
      "ADDR" => DS . SYSTEM_NAME . DS . "Site" . DS . "Default"
    ),
    1 => Array(
      "NAME" => "사이트 약관",
      "ADDR" => DS . SYSTEM_NAME . DS . "Site" . DS . "Agrement"
    )
  )
);
// 게시판 메뉴
$AD_MENU["Board"] = Array(
  "NAME" => "게시판",
  "SUB" => Array(
    0 => Array(
      "NAME" => "게시판 리스트",
      "ADDR" => DS . SYSTEM_NAME . DS . "Board" . DS . "Lists"
    ),
    1 => Array(
      "NAME" => "게시판 권한",
      "ADDR" => DS . SYSTEM_NAME . DS . "Board" . DS . "Auth"
    )
  )
);
// 회원 메뉴
$AD_MENU["Member"] = Array(
  "NAME" => "회원",
  "SUB" => Array(
    0 => Array(
      "NAME" => "회원 리스트",
      "ADDR" => DS . SYSTEM_NAME . DS . "Member" . DS . "Lists"
    ),
    1 => Array(
      "NAME" => "회원 등급",
      "ADDR" => DS . SYSTEM_NAME . DS . "Member" . DS . "Level"
    ),
    2 => Array(
      "NAME" => "회원 그룹",
      "ADDR" => DS . SYSTEM_NAME . DS . "Member" . DS . "Group"
    ),
    3 => Array(
      "NAME" => "탈퇴 회원",
      "ADDR" => DS . SYSTEM_NAME . DS . "Member" . DS . "Deleter"
    )
  )
);
//기타
$AD_MENU["Others"] = Array(
  "NAME" => "기타",
  0 => DS . SYSTEM_NAME . DS . "Others" . DS . "Popup",
  1 => DS . SYSTEM_NAME . DS . "Others" . DS . "Menu",
  2 => DS . SYSTEM_NAME . DS . "Others" . DS . "stats"
)

include_once("../env.php");
include_once(LIB . "/class.davin.php");

?>
