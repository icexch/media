(function() {
    var init, initAd, getAdInfo, createRequest, showed, clicked;
    var HOST = "http://icexch.dev/api/v1/";
    init = function () {
        var url = "pixel-point/show";
        var data = [
            ["ids", ""]
        ];

        var ads = document.getElementsByClassName("area-ad");

        for (var i = 0; i < ads.length; i++) {
            data[0][1] === "" ? data[0][1] += getAdInfo(ads[i]).id : data[0][1] += "," + getAdInfo(ads[i]).id;
        }

        if (data[0][1].length > 0) {
            var xhr = createRequest({url: url, data: data, isResponse: true});
            xhr.onreadystatechange = function () {
                if (this.readyState === 4) {
                    var data = {message: '', error: true, adsIds: [], ads: []};
                    try {
                        data = JSON.parse(this.response);
                    } catch (e) {}

                    if (this.status >= 500) {
                        setTimeout(function () {
                            createRequest({url: url, data: data, isResponse: true});
                        }, 5000);
                    } else if (this.status === 200) {
                        var adsIDs = [],
                            placeIDs = [];
                        for (var i = 0; i < data.ads.length; i++) {
                            initAd(data.ads[i]) ? placeIDs.push(data.ads[i].placeID) && adsIDs.push(data.ads[i].id) : false;
                        }
                        showed(placeIDs, adsIDs)
                    }
                }
            };

            xhr.send(xhr.mybody);
        }
    };
    initAd = function (parameters) {
        var id = parameters.id || "",
            href = parameters.href || "",
            placeID = parameters.placeID || "",
            data = parameters.data || "";

        var ads = document.querySelector("ins[data-area-ad-client='" + placeID + "']");
        if (!ads) {
            return null;
        }
        ads.addEventListener('click', clicked, false);
        ads.setAttribute("data-area-ad-id", id);
        var a = document.createElement("a");
        a.href = href;
        a.innerHTML = data;
        ads.innerHTML = a.outerHTML;

        return id;
    };
    getAdInfo = function (ads) {
        return {
            'id': ads.getAttribute("data-area-ad-client")
        };
    };
    createRequest = function (parameters) {
        var url = HOST + parameters.url,
            type = parameters.type || "POST",
            data = parameters.data,
            isResponse = parameters.isResponse;

        var xhr = new XMLHttpRequest();
        var body = '';

        for (var i = 0; i < data.length; i++) {
            body += "&" + data[i][0] + '=' + encodeURIComponent(data[i][1]);
        }
        xhr.mybody = body;
        xhr.open(type, url, true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        if (isResponse) {
            return xhr;
        } else {
            xhr.onreadystatechange = function () {
                if (this.readyState === 4) {
                    var data = {message: '', error: true};
                    try {
                        data = JSON.parse(this.response);
                    } catch (e) {
                    }

                    if (this.status >= 500 || data.error) {
                        setTimeout(function () {
                            createRequest({url: url, type: type, data: data});
                        }, 5000);
                    }
                }
            };

            xhr.send(body);
        }
    };
    showed = function (placeIDs, adsIDs) {
        var url = "pixel-point/showed";
        var data = [
            ["adsIDs", adsIDs.join(",")],
            ["placesIDs", placeIDs.join(",")]
        ];

        createRequest({url: url, data: data});
    };
    clicked = function (event) {
        event.preventDefault();

        var url = "pixel-point/clicked";
        var data = [
            ["placeID", this.getAttribute("data-area-ad-client")],
            ["adID", this.getAttribute("data-area-ad-id")]
        ];
        createRequest({url: url, data: data});
    };
    init();
}).call(this);
