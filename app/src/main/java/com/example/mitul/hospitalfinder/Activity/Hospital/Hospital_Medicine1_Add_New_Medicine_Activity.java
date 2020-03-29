package com.example.mitul.hospitalfinder.Activity.Hospital;

import android.app.Dialog;
import android.content.Context;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.view.Window;
import android.view.WindowManager;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.error.VolleyError;
import com.android.volley.request.SimpleMultiPartRequest;
import com.example.mitul.hospitalfinder.Constants.AppConstants;
import com.example.mitul.hospitalfinder.Constants.URL;
import com.example.mitul.hospitalfinder.Model.MyApplication;
import com.example.mitul.hospitalfinder.R;

import org.json.JSONException;
import org.json.JSONObject;

public class Hospital_Medicine1_Add_New_Medicine_Activity extends AppCompatActivity {
    EditText et_hs_new_med_name, et_hs_new_med_stock, et_hs_lg1_new_md_des;
    Button btn_hs_lg_med_Add;
    Context context;
    String hospital_id1, name, stock, description;
    int stock1;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_hospital__medicine1__add__new__medicine_);
        getSupportActionBar().hide();
        initview();
        setListener();
    }


    private void initview() {
        context = Hospital_Medicine1_Add_New_Medicine_Activity.this;
        et_hs_new_med_name = (EditText) findViewById(R.id.et_hs_new_med_name);
        et_hs_new_med_stock = (EditText) findViewById(R.id.et_hs_new_med_stock);
        et_hs_lg1_new_md_des = (EditText) findViewById(R.id.et_hs_lg1_new_md_des);

        btn_hs_lg_med_Add = (Button) findViewById(R.id.btn_hs_lg_med_Add);
        hospital_id1 = getIntent().getStringExtra("hospital_id");
        et_hs_new_med_name.requestFocus();


    }

    private void setListener() {

        btn_hs_lg_med_Add.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                name = et_hs_new_med_name.getText().toString().trim();
                stock = et_hs_new_med_stock.getText().toString().trim();
                description = et_hs_lg1_new_md_des.getText().toString().trim();
                name = name.toUpperCase();

                if (name.length() == 0) {
                    et_hs_new_med_name.setError("Please Enter Medicine Name");
                    et_hs_new_med_name.requestFocus();

                } else if (stock.length() == 0) {
                    et_hs_new_med_stock.setError("Please enter Stock first");
                    et_hs_new_med_stock.requestFocus();

                } else if (description.length() == 0) {
                    et_hs_lg1_new_md_des.setError("Please Enter Name");
                    et_hs_lg1_new_md_des.requestFocus();
                } else {
                    if (stock1 < 0) {
                        stock1 = Integer.parseInt(stock);

                        et_hs_new_med_stock.setError("Nagative stock is not valid");
                        et_hs_new_med_stock.setText("");
                        et_hs_new_med_stock.requestFocus();
                    } else {
                        CallCheckMedicineApi();
                    }
                }
            }
        });
    }

    private void CallCheckMedicineApi() {
        AppConstants.showDialog(context);
        SimpleMultiPartRequest smr = new SimpleMultiPartRequest(Request.Method.POST, URL.HOSPITAL_CHECK_NEW__MEDICINE, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {

                Log.e("Res hos_new_medicne", response);

                try {
                    JSONObject jsonObject = new JSONObject(response);
                    String status = jsonObject.getString("STATUS");
                    String msg = jsonObject.getString("MSG");

                    if (status.equals("1")) {
                        AppConstants.dissmissDialog();

                        AppConstants.openErrorDialog(context, "Medicine is already exist");
                        et_hs_new_med_name.setText("");
                        et_hs_new_med_name.requestFocus();


                    } else if (status.equals("0")) {
                        CallUpdateMedicineAPi();


                    }


                } catch (JSONException e) {
                    e.printStackTrace();
                }


            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                AppConstants.openErrorDialog(context, "Some error");
            }
        });

        smr.addStringParam("hospital_id", hospital_id1);
        smr.addStringParam("name", name);

        MyApplication.getInstance().addToRequestQueue(smr);
    }

    private void CallUpdateMedicineAPi() {
        SimpleMultiPartRequest smr = new SimpleMultiPartRequest(Request.Method.POST, URL.HOSPITAL_INSERT_NEW__MEDICINE, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {

                AppConstants.dissmissDialog();
                Log.e("Res hos_new_medicne", response);

                try {
                    JSONObject jsonObject = new JSONObject(response);
                    String status = jsonObject.getString("STATUS");
                    String msg = jsonObject.getString("MSG");

                    if (status.equals("1")) {

                        final Dialog dialog = new Dialog(context);
                        dialog.setContentView(R.layout.dialog_messge);
                        dialog.setCancelable(false);

                        Window window = dialog.getWindow();
                        window.setLayout(WindowManager.LayoutParams.MATCH_PARENT, WindowManager.LayoutParams.WRAP_CONTENT);
                        final Button btn_done = (Button) dialog.findViewById(R.id.btn_done1);
                        TextView txt_error_msg = (TextView) dialog.findViewById(R.id.txt_error_msg1);
                        txt_error_msg.setText("Inserted");
                        btn_done.setOnClickListener(new View.OnClickListener() {
                            @Override
                            public void onClick(View v) {
                                dialog.dismiss();

                                finish();
                            }
                        });
                        dialog.show();

                    } else if (status.equals("0")) {
                        AppConstants.openErrorDialog(context, "Medicine not Inserted");


                    }


                } catch (JSONException e) {
                    e.printStackTrace();
                }


            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                AppConstants.openErrorDialog(context, "Some error");
            }
        });


        smr.addStringParam("hospital_id", hospital_id1);
        smr.addStringParam("name", name);
        smr.addStringParam("stock", stock);
        smr.addStringParam("description", description);

        MyApplication.getInstance().addToRequestQueue(smr);


    }
}
