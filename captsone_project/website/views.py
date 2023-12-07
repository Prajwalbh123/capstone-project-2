from flask import Blueprint, render_template, request, flash, jsonify
from flask_login import login_required, current_user
from .models import Note, Marker
from . import db
import json


views = Blueprint('views', __name__)


@views.route('/', methods=['GET', 'POST'])
@login_required
def home():
    if request.method == 'POST': 
        note = request.form.get('note')#Gets the note from the HTML 

        if len(note) < 1:
            flash('Note is too short!', category='error') 
        else:
            new_note = Note(data=note, user_id=current_user.id)  #providing the schema for the note 
            db.session.add(new_note) #adding the note to the database 
            db.session.commit()
            flash('Note added!', category='success')
    markers = Marker.query.all()

    return render_template("index.html", user=current_user, markers = markers)


@views.route('/delete-note', methods=['POST'])
def delete_note():  
    note = json.loads(request.data) # this function expects a JSON from the INDEX.js file 
    noteId = note['noteId']
    note = Note.query.get(noteId)
    if note:
        if note.user_id == current_user.id:
            db.session.delete(note)
            db.session.commit()

    return jsonify({})

# Add this import at the top of your views.py
from flask import request, jsonify

# Add this route to your views.py
@views.route('/save_marker_and_image', methods=['POST'])
def save_marker_and_image():
    data = request.get_json()
    image_data = data['imageData']
    marker_position = data['markerPosition']

    # Save the image data to the database
    new_note = Note(data=image_data, user_id=current_user.id)
    db.session.add(new_note)
    db.session.commit()

    # Save the marker details to the database
    new_marker = Marker(
        latitude=marker_position['lat'],
        longitude=marker_position['lng'],
        image_url=new_note.data,  # Assuming you want to store the image URL
        note_id=new_note.id
    )
    db.session.add(new_marker)
    db.session.commit()

    return jsonify({'message': 'Marker and image data saved successfully'})
