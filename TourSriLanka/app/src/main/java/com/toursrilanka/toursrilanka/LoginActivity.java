package com.toursrilanka.toursrilanka;

import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.graphics.Color;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.view.WindowManager;
import android.view.animation.Animation;
import android.view.animation.AnimationUtils;
import android.widget.ImageView;
import android.widget.TextView;

public class LoginActivity extends Activity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        overridePendingTransition(R.anim.trans_left_in, R.anim.trans_left_out);

        ImageView imageView = (ImageView) findViewById(R.id.imageView_slide_img_1);
        imageView.setBackgroundResource(R.drawable.t_slider_back_1);

        getWindow().setSoftInputMode(WindowManager.LayoutParams.SOFT_INPUT_STATE_HIDDEN);

        slideBackground();
    }

    public void sign_up_click(View v){

        TextView textView = (TextView)findViewById(R.id.textView_sign_up);
        textView.setTextColor(Color.parseColor("#ffffff"));

        startActivity(new Intent(LoginActivity.this, RegisterActivity.class));
        finish();
    }

    public void slideBackground() {

        Thread th = new Thread(new Runnable() {

            int count = 0;

            public void run() {

                while(true){

                    try {
                        Thread.sleep(5000);
                    }
                    catch (InterruptedException e) {
                        e.printStackTrace();
                    }

                    runOnUiThread(new Runnable() {
                        @Override
                        public void run() {

                            final ImageView imageView = (ImageView) findViewById(R.id.imageView_slide_img_1);
                            final ImageView imageView1 = (ImageView) findViewById(R.id.imageView_slide_img_2);
                            final Context c = getBaseContext();

                            if(count == 0){

                                imageView.setBackgroundResource(R.drawable.t_slider_back_1);
                                imageView1.setBackgroundResource(R.drawable.t_slider_back_2);


                                Animation fade_in = AnimationUtils.loadAnimation(c, R.anim.fade_in_slider_1);
                                Animation fade_out = AnimationUtils.loadAnimation(c, R.anim.fade_out_slider_1);

                                imageView.startAnimation(fade_out);
                                imageView1.startAnimation(fade_in);


                                count = 1;
                            }
                            else if(count == 1){

                                imageView.setBackgroundResource(R.drawable.t_slider_back_2);
                                imageView1.setBackgroundResource(R.drawable.t_slider_back_3);

                                Animation fade_in = AnimationUtils.loadAnimation(c, R.anim.fade_in_slider_1);
                                Animation fade_out = AnimationUtils.loadAnimation(c, R.anim.fade_out_slider_1);

                                imageView.startAnimation(fade_out);
                                imageView1.startAnimation(fade_in);

                                count = 2;
                            }
                            else{

                                imageView.setBackgroundResource(R.drawable.t_slider_back_3);
                                imageView1.setBackgroundResource(R.drawable.t_slider_back_1);

                                Animation fade_in = AnimationUtils.loadAnimation(c, R.anim.fade_in_slider_1);
                                Animation fade_out = AnimationUtils.loadAnimation(c, R.anim.fade_out_slider_1);

                                imageView.startAnimation(fade_out);
                                imageView1.startAnimation(fade_in);

                                count = 0;
                            }
                        }
                    });


                }
            }
        });
        th.start();
    }
}
