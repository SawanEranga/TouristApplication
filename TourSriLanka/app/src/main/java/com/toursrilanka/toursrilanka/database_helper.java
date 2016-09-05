package com.toursrilanka.toursrilanka;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

public class database_helper extends SQLiteOpenHelper {
    public database_helper(Context context) {
        super(context, "thinu_iq_db", null, 1);

    }

    @Override
    public void onCreate(SQLiteDatabase db) {
        db.execSQL("create table user (user_name text primary key,email text,password text,country text,phone_no_status text)");

        String count = "SELECT count(*) FROM user";
        Cursor mcursor = db.rawQuery(count, null);
        mcursor.moveToFirst();
        int icount = mcursor.getInt(0);
        if(icount==0){

            ContentValues contentValues = new ContentValues();
            contentValues.put("user_name","null");
            contentValues.put("email","null");
            contentValues.put("password","null");
            contentValues.put("country","null");
            contentValues.put("phone_no_status","1");
            db.insert("user",null,contentValues);

        }
    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
        db.execSQL("drop table if exists user");
        onCreate(db);
    }

    public Cursor get_user_details(){
        SQLiteDatabase db = this.getWritableDatabase();
        Cursor c = db.rawQuery("select * from user",null);
        return c;
    }

//    public boolean insert_username(String user_name){
//        SQLiteDatabase db = this.getWritableDatabase();
//        ContentValues contentValues = new ContentValues();
//        contentValues.put("user_name",user_name);
//        contentValues.put("current_level","1");
//        long result = db.insert("user",null,contentValues);
//        if(result == -1){
//            return false;
//        }
//        else{
//            return true;
//        }
//    }


}
