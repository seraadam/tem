<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class Helper {
    public static function getRoles(){
        return \App\Role::all();
    }

    public static function flashMessage($message = '', $icon = 'success', $duration = 2){
        Session::flash('message', $message);
        Session::flash('icon', $icon);
        Session::flash('time', $duration);
    }

    public static function convertBoolValue($bool){
      return $bool ? 'مفعل' : 'غير مفعل';
    }

    public static function deleteFile($fileName){
      if (file_exists($fileName)) {
        if (File::delete($fileName)) {
          Helper::flashMessage('تم الحذف بنجاح');
        }
      }
    }

    public static function isActiveChoices(){
        return [0 => 'غير مفعل', 1 => 'مفعل'];
    }

    public static function getHumanDate($date){
        return Carbon::parse($date)->diffForHumans();
    }

    public static function getOrganizationTypes(){
        return \App\OrganizationType::latest()->pluck('type', 'id');
    }

    public static function getGroupsIds(){
        return \App\Group::latest()->pluck('group', 'id');
    }

    public static function getOrganizationsIds(){
        return \App\Organization::latest()->pluck('organization', 'id');
    }

    public static function getLanguagesIds(){
        return \App\Language::latest()->pluck('language', 'id');
    }

    public static function getLevels(){
        return \App\Level::all();
    }
}
