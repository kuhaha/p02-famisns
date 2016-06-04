/*
    XMLHttpRequestのラッピング
*/
function XMLHttpRequestCreate() {
    try {
        console.log("1");
        return new XMLHttpRequest();        // XMLHttpRequest オブジェクトを作成
    } catch (e) {}

    try {
        console.log("2");
        return new ActiveXObject('MSXML2.XMLHTTP.6.0');
    } catch (e) {}

    try {
        console.log("3");
        return new ActiveXObject('MSXML2.XMLHTTP.3.0');
    } catch (e) {}

    try {
        console.log("4");
        return new ActiveXObject('MSXML2.XMLHTTP');
    } catch (e) {}

    console.log("5");
    return null;    // 未対応
}