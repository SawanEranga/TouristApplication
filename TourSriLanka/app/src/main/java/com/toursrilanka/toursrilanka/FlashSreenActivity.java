package com.toursrilanka.toursrilanka;

import android.app.Activity;
import android.content.Intent;
import android.database.Cursor;
import android.graphics.Color;
import android.graphics.PorterDuff;
import android.os.Handler;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.ProgressBar;

import java.nio.Buffer;

public class FlashSreenActivity extends Activity {

    ProgressBar progressBar;
    database_helper db;
    String phone_status;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_flash_sreen);
        overridePendingTransition(R.anim.fade_in, R.anim.fade_out);

        db = new database_helper(this);
        Cursor res = db.get_user_details();
        StringBuffer stringBuffer = new StringBuffer();
        while (res.moveToNext()){
            phone_status = res.getString(4);
        }
        Handler handler = new Handler();
        handler.postDelayed(new Runnable() {
            @Override
            public void run() {

                if(phone_status.equals("0")){
                    startActivity(new Intent(FlashSreenActivity.this, RegisterActivity.class));
                    finish();
                }
                else{
                    startActivity(new Intent(FlashSreenActivity.this, Phone_number_Activity.class));
                    finish();
                }


            }
        }, 3500);

        progressBar = (ProgressBar)findViewById(R.id.progressBar_main);

        int color = Color.parseColor("#009900");
        progressBar.getIndeterminateDrawable().setColorFilter(color, PorterDuff.Mode.SRC_IN);
        progressBar.getProgressDrawable().setColorFilter(color, PorterDuff.Mode.SRC_IN);

        progressBar.setProgress(0);

        new Thread(new thread_progressBar()).start();
    }

    class thread_progressBar implements Runnable{

        @Override
        public void run() {
            for(int i=0;i<100;i++){
                final int value = i;
                try {
                    Thread.sleep(30);
                } catch (InterruptedException e) {
                    e.printStackTrace();
                }
                progressBar.setProgress(value);
            }
        }
    }
}
