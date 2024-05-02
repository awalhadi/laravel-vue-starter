// import { iziToast } from "izitoast";

// initialize settings

import { isProxy, toRaw } from "vue";
import Translate from "./trans/translate_helper";
import axios from 'axios';
import { toast } from 'vue3-toastify';
import * as _ from "lodash";
// options = {
//     timeOut: 5000,
//     showDuration: 300,
//     progressBar: true,
//     icon: "material-icons",
//     closeButton: true,
//     showMethod: "fadeIn",
//     positionClass: "toast-top-right",
// };

interface ToastOptions {
  theme?: string;
  type?: "info" | "success" | "warning" | "error" | "question";
  dangerouslyHTMLString?: boolean;
  autoClose?: number;
  showDuration?: number;
  progressBar?: boolean;
  transition?: string;
}

const defaultToastOptions: ToastOptions = {
  theme: "auto",
  type: "default",
  dangerouslyHTMLString: true,
  autoClose: 5,
  showDuration: 300,
  progressBar: true,
  transition: 'slide',
};

interface Features {
    title?: string;
    zindex?: 999;
    message?: string;
    position?: string;
}

const notify = (
    message: string = "",
    type: "info" | "success" | "warning" | "error" | "question" = "info",
    position: 'top-center | top-right | top-left | bottom-right | bottom-center | bottom-left' = ""
): void => {
    if (message && message.length > 0) {
    const options: ToastOptions = { ...defaultToastOptions, type };
    if(position)
      {
        options.position = position
      }
        toast(message, options);
    }
};

const notifyErrors = (
    messages: Object | Array<any>,
    // messages: { [key: string]: any },
): void => {
    for (const errorItem in messages) {
        messages[errorItem].forEach((error: any) => {
            notify(error, "error");
        });
    }
};

const proxyObjToPlainObj = (obj: any): any => {
  if (!obj && typeof obj === "undefined") {
    return obj;
  } else {
      return isProxy(obj) ? toRaw(obj) : JSON.parse(JSON.stringify(obj));
  }
};

const proxyObjToArray = (proxyObj: any):any[] => {
    const proxyData = proxyObjToPlainObj(proxyObj);

    const results = Object.keys(proxyData).map((key) => {
        return proxyData[key];
    });
    return results;
};


const findBy = (
    array: any[],
    findByValue: number | string,
    findPropertyName: string = "id"
) => {
    if (typeof array === "undefined") {
        return array;
    }

    const proxyData = proxyObjToPlainObj(array);

    const results = Object.keys(proxyData).map((key) => {
        return proxyData[key];
    });

    // return _.find(results);
    const item = _.findIndex(results, function (obj) {
        return obj[findPropertyName] == findByValue;
    });
    return item;
};

const proxyObjToArrayWithReverse = (proxyObj: any) => {
    const array = proxyObjToArray(proxyObj);
    return _.reverse(array);
};

const strLimit = (
    str: string,
    limitLength: number = 18,
    concatenate: string = "..."
): string => {
    return str.length > limitLength ? `${str.substr(0, limitLength)}${concatenate}` : str;
};

let allLangData:any;

const  getTrans = (model: string, id?:number, locale?:'bn', field_name?:'string', defaultVal?:string|number|null) => {
    const trans = new Translate(model, locale, id, field_name, defaultVal);
    return trans.getTransData();
}

const initiateTranslate = async (model, locale)=>{
    let  id, field_name, defaultVal;
    const trans = new Translate(model, locale, id, field_name, defaultVal);
    return await trans.initializeTranslate();
}

const removeSessionTranslateData = (model:any =null, locale:any=null): any => {
    let  id, field_name, defaultVal;
    const trans = new Translate(model, locale, id, field_name, defaultVal);
    return trans.clearSessionData();
}

export {
    notify,
    proxyObjToPlainObj,
    proxyObjToArray,
    findBy,
    strLimit,
    proxyObjToArrayWithReverse,
    notifyErrors,
    getTrans,
    initiateTranslate,
    removeSessionTranslateData
};
