#parser stuff

def convert_json(items):
    import json
    return json.dumps({ "type": "FeatureCollection",
                        "features": [ 
                                        {"type": "Feature",
                                         "geometry": { "type": "Point",
                                                       "coordinates": [ float(feature['LOC_LAT']),
                                                                        float(feature['LOC_LON'])]},
                                         "properties": { key: value 
                                                         for key, value in feature.items()
                                                         if key not in ('LOC_LAT', 'LOC_LON') }
                                         } 
                                     for feature in json.loads(items)
                                    ]
                       })

aaa = open('data.json')
bbb = aaa.read()

ccc = convert_json(bbb)

print ccc
