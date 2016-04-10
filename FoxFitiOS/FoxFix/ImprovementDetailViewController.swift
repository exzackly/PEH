//
//  ImprovementDetailViewController.swift
//  FoxFix
//
//  Created by EXZACKLY on 4/9/16.
//  Copyright © 2016 EXZACKLY. All rights reserved.
//

import UIKit

class ImprovementDetailViewController: UIViewController, UITableViewDelegate, UITableViewDataSource {

    @IBOutlet weak var descriptionLabel: UILabel!
    @IBOutlet weak var lifecycleLabel: UILabel!
    @IBOutlet weak var likesLabel: UILabel!
    @IBOutlet weak var tableView: UITableView!
    @IBOutlet weak var likesIcon: UIImageView!
    var iid: Int!
    var uid: Int!
    var comments = [(user: String, comment: String)]()
    
    override func viewDidLoad() {
        super.viewDidLoad()
        tableView.delegate = self
        tableView.dataSource = self
        descriptionLabel.lineBreakMode = .ByWordWrapping
        descriptionLabel.numberOfLines = 0
        lifecycleLabel.lineBreakMode = .ByWordWrapping
        lifecycleLabel.numberOfLines = 2
        parseImprovement()
    }
    
    func parseImprovement() {
        do {
            let improvementSource = try String(contentsOfURL: NSURL(string: "http://www.exzackly7.com/PEH/backend/displayImprovements.php?iid=" + String(iid))!).componentsSeparatedByString("#")
            comments = []
            if (improvementSource[4] != "[]") {
                for comment in improvementSource[4].stringByReplacingOccurrencesOfString("[", withString: "").stringByReplacingOccurrencesOfString("]", withString: "").componentsSeparatedByString(";") {
                    comments.append((user: comment.componentsSeparatedByString(":")[0], comment: comment.componentsSeparatedByString(":")[1]))
                }
            }
           navigationItem.title = improvementSource[0]
            descriptionLabel.text = "Description: " + improvementSource[1]
            lifecycleLabel.text = "Current phase: " + improvementSource[2]
            likesLabel.text = "Likes: " + improvementSource[3]
            
            let userLikes = try String(contentsOfURL: NSURL(string: "http://www.exzackly7.com/PEH/backend/userLikes.php?uid=\(String(uid))&iid=\(String(iid))")!)
            if userLikes == "true" {
                likesIcon.highlighted = true
            }
            tableView.reloadData()
        } catch let error {
            print(error)
        }
        
    }
    @IBAction func heartTapped(sender: UITapGestureRecognizer) {
        if let view = sender.view as? UIImageView {
            if !view.highlighted {
                do {
                    var _ = try String(contentsOfURL: NSURL(string: "http://www.exzackly7.com/PEH/backend/addLike.php?iid=\(self.iid)&uid=\(self.uid)")!)
                    parseImprovement()
                } catch let error {
                    print(error)
                }
            }
        }
    }
    @IBAction func addComment(sender: UIButton) {
        let commentAlert = UIAlertController(title: "Enter Comment", message: nil, preferredStyle: .Alert)
        var commentTextField: UITextField?
        commentAlert.addTextFieldWithConfigurationHandler{(input: UITextField) in
            input.placeholder = "Comment"
            input.clearButtonMode = .WhileEditing
            commentTextField = input
        }
        commentAlert.addAction(UIAlertAction(title: "Add", style: .Default, handler: {_ in
            do {
               var _ = try String(contentsOfURL: NSURL(string: "http://www.exzackly7.com/PEH/backend/addComment.php?iid=\(self.iid)&uid=\(self.uid)&cmt=\((commentTextField?.text)!)".stringByReplacingOccurrencesOfString(" ", withString: "%20"))!)
                self.parseImprovement()
            } catch let error {
                print(error)
            }
        }))
        commentAlert.addAction(UIAlertAction(title: "Cancel", style: .Cancel, handler: nil))
        presentViewController(commentAlert, animated: true, completion: nil)
    }
    
    //MARK: - Table view
    func tableView(tableView: UITableView, numberOfRowsInSection section: Int) -> Int {
        return comments.count
    }
    
    func tableView(tableView: UITableView, cellForRowAtIndexPath indexPath: NSIndexPath) -> UITableViewCell {
        let cell = tableView.dequeueReusableCellWithIdentifier("cell")!
        
        cell.textLabel?.text = comments[indexPath.row].user + " - " + comments[indexPath.row].comment
        
        return cell
    }
    
}

