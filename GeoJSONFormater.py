import sys

filename = "data_.json"

def convert_to_geojson(items):
    import json
    return json.dumps({ "type": "FeatureCollection",
                        "features": [
                                        {"type": "Feature",
                                         "geometry": { "type": "Point",
                                                       "coordinates": [ feature['longitude'],
                                                                        feature['latitude']]},
                                         "properties": { key: value
                                                         for key, value in feature.items()
                                                         if key not in ('latitude', 'longitude') }
                                         }
                                     for feature in json.loads(items)
                                    ]
                       })

tempJSONFile = open(filename)
tempJSONFileData = tempJSONFile.read()

geoJSONData = convert_to_geojson(tempJSONFileData)

print(geoJSONData)