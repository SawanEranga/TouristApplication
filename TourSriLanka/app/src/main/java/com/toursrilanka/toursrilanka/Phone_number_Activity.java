package com.toursrilanka.toursrilanka;

import android.app.Activity;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.res.Configuration;
import android.graphics.Color;
import android.graphics.Typeface;
import android.media.Image;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.Display;
import android.view.Gravity;
import android.view.LayoutInflater;
import android.view.MotionEvent;
import android.view.View;
import android.view.ViewGroup;
import android.view.animation.Animation;
import android.view.animation.AnimationUtils;
import android.widget.ArrayAdapter;
import android.widget.AutoCompleteTextView;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.ScrollView;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

public class Phone_number_Activity extends Activity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_phone_number_);
        overridePendingTransition(R.anim.trans_left_in, R.anim.trans_left_out);

        ImageView imageView = (ImageView) findViewById(R.id.imageView_slide_img_1);
        imageView.setBackgroundResource(R.drawable.t_slider_back_1);

        AutoCompleteTextView autoCompleteTextView = (AutoCompleteTextView)findViewById(R.id.autoCompleteTextView);
        String [] country_name;
        country_name = getResources().getStringArray(R.array.all_countries_array);
        ArrayAdapter<String> arrayAdapter = new ArrayAdapter<String>(this,android.R.layout.simple_list_item_1,country_name);
        autoCompleteTextView.setAdapter(arrayAdapter);
//
//        Spinner spinner = (Spinner) findViewById(R.id.planets_spinner);
//// Create an ArrayAdapter using the string array and a default spinner layout
//        ArrayAdapter<CharSequence> adapter = ArrayAdapter.createFromResource(this,
//                R.array.planets_array, android.R.layout.simple_spinner_item);
//// Specify the layout to use when the list of choices appears
//        adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
//// Apply the adapter to the spinner
//        spinner.setAdapter(adapter);


        Button button_continue = (Button)findViewById(R.id.button_continue);
        button_continue.setOnTouchListener(new View.OnTouchListener() {
            @Override
            public boolean onTouch(View v, MotionEvent event) {
                if (event.getAction() == MotionEvent.ACTION_DOWN) {
                    Button button_continue = (Button)findViewById(R.id.button_continue);
                    button_continue.setBackgroundColor(Color.parseColor("#008000"));
                } else if (event.getAction() == MotionEvent.ACTION_UP) {
                    Button button_continue = (Button)findViewById(R.id.button_continue);
                    button_continue.setBackgroundColor(Color.parseColor("#00cc00"));
                }
                return false;
            }
        });


        slideBackground();

    }

        @Override
    public void onBackPressed() {
            new AlertDialog.Builder(this)

                    .setMessage("Do you want to exit")
                    .setPositiveButton("Yes", new DialogInterface.OnClickListener()
                    {
                        @Override
                        public void onClick(DialogInterface dialog, int which) {
                            System.exit(0);
                        }

                    })
                    .setNegativeButton("No", null)
                    .show();
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


    public void btn_continue_onclick(View v){

        TextView textView = (TextView)findViewById(R.id.editText);
        String text = textView.getText().toString();
        if(text.trim().length() == 0){

            LayoutInflater layoutInflater11 = getLayoutInflater();
            View toast_layout_error = layoutInflater11.inflate(R.layout.toast_layout_error,
                    (ViewGroup)findViewById(R.id.toast_layout_error));

            TextView toast_error_textview = (TextView) toast_layout_error.findViewById(R.id.toast_error_textview);

            toast_error_textview.setText("please enter phone number");


            Toast toast1 = new Toast(getApplicationContext());
            toast1.setDuration(Toast.LENGTH_SHORT);
            toast1.setGravity(Gravity.BOTTOM|Gravity.FILL_HORIZONTAL,0,0);
            toast1.setView(toast_layout_error);
            toast1.show();
        }
        else{

//            boolean isInserted = db.insert_username(text);

//            if(isInserted){
                Intent i = new Intent(getApplicationContext(), RegisterActivity.class);
                i.putExtra("direction", "forward");
                i.putExtra("username", text);
                startActivity(i);
                finish();
//            }


        }

    }


}
